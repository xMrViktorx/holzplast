<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Shop\Entities\Cart;
use Modules\Admin\Entities\Order;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Entities\Category;
use Modules\Admin\Entities\OrderItem;
use Modules\Admin\Entities\BillingAddress;
use Modules\Admin\Entities\ShippingAddress;
use Illuminate\Contracts\Support\Renderable;
use Modules\Shop\Emails\OrderConfirmationMail;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        if ($query) {
            $products = Product::where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->where('status', 1)
                ->orderByRaw('ISNULL(sort_in_landing), sort_in_landing')
                ->paginate(12);
        } else {
            $products = Product::where('status', 1)->orderByRaw('ISNULL(sort_in_landing), sort_in_landing')->paginate(12);
        }
        return view('shop::index', compact('products'));
    }

    /**
     * Get all categories for the navbar.
     * @return Renderable
     */
    public static function getCategories()
    {
        $categories = Category::where('status', 1)->whereNull('parent_category_id')->get();
        return $categories;
    }

    /**
     * Show product or category view. If neither category nor product matches, abort with code 404.
     *
     * @return \Illuminate\View\View|\Exception
     */
    public function getCategoryOrProduct(Request $request)
    {
        // Get the path info from the request and decode the URL
        $pathInfo = urldecode(trim($request->getPathInfo(), '/'));

        // Split the path into segments using the '/' delimiter
        $segments = explode('/', $pathInfo);

        // Get the last segment (slug)
        $slug = end($segments);

        $product = Product::where('slug', $slug)->first();

        if ($product) {
            return view('shop::product-details', compact('product'));
        }

        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $products =  $category->products()->where('status', 1)->orderByRaw('ISNULL(sort_in_category), sort_in_category')->paginate(12);
            return view('shop::category-overview', compact('products'));
        } else {
            abort(404);
        }

        return view('shop::details');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function checkout()
    {
        $cart = '';
        if (session()->has('cart')) {
            $cart = Cart::find(session()->get('cart')->id);
        } else {
            return redirect()->route('cart.index');
        }
        return view('shop::checkout', compact('cart'));
    }

    /**
     * Save the order.
     * @return Renderable
     */
    public function saveOrder(Request $request)
    {
        $fields = [];
        // Common validation fields for billing
        $commonBillingFields = [
            'billing.email' => 'required|email',
            'billing.phone' => 'required',
            'billing.country' => 'required|string',
            'billing.city' => 'required|string',
            'billing.postcode' => 'required',
            'billing.address' => 'required',
            'billing.house_number' => 'required',
            'data_privacy' => 'required',
            'pickup' => 'required',
        ];

        if (isset($request->billing['private_person'])) {
            // Additional fields for private person billing
            $commonBillingFields += [
                'billing.first_name' => 'required|string',
                'billing.last_name' => 'required|string',
            ];
        } else {
            // Additional fields for company billing
            $commonBillingFields += [
                'billing.company' => 'required|string',
                'billing.tax_number' => 'required|string',
            ];
        }

        $fields += $commonBillingFields;

        // Common validation fields for shipping
        if (!$request->use_as_shipping_address) {
            $commonShippingFields = [
                'shipping.email' => 'required|email',
                'shipping.phone' => 'required',
                'shipping.country' => 'required|string',
                'shipping.city' => 'required|string',
                'shipping.postcode' => 'required',
                'shipping.address' => 'required',
                'shipping.house_number' => 'required',
            ];

            if (isset($request->shipping['private_person'])) {
                // Additional fields for private person shipping
                $commonShippingFields += [
                    'shipping.first_name' => 'required|string',
                    'shipping.last_name' => 'required|string',
                ];
            } else {
                // Additional fields for company shipping
                $commonShippingFields += [
                    'shipping.company' => 'required|string',
                ];
            }

            $fields += $commonShippingFields;
        }


        $validated = $request->validate($fields);

        $cart = '';
        if (session()->has('cart')) {
            $cart = Cart::find(session()->get('cart')->id);
        } else {
            return redirect()->route('cart.index');
        }

        $order['status'] = 'in progress';
        $order['total_price'] = $cart->total_price;
        $order['pickup'] = $request->pickup;
        $order = Order::create($order);

        // Retrieve the input data from the request
        $inputData = $request->all();

        // Add or modify the 'order_id' within the 'billing' section of the request data
        $inputData['billing']['order_id'] = $order->id;

        // Set the modified data back to the request
        $request->merge($inputData);

        BillingAddress::create($request->billing);

        if (!$request->use_as_shipping_address) {
            // Add or modify the 'order_id' within the 'shipping' section of the request data
            $inputData['shipping']['order_id'] = $order->id;

            // Set the modified data back to the request
            $request->merge($inputData);
            ShippingAddress::create($request->shipping);
        } else {
            ShippingAddress::create($request->billing);
        }

        $cart->order_id = $order->id;
        $cart->save();

        $cartItems = $cart->cart_items->map(function ($item) use ($order) {
            return [
                'name' => $item->name,
                'product_id' => $item->product_id,
                'order_id' => $order->id,
                'quantity' => $item->quantity,
                'item_price' => $item->item_price,
                'total_price' => $item->total_price,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        OrderItem::insert($cartItems->toArray());

        Mail::to($order->billing_address->email)->bcc(env('ADMIN_ADDRESS', 'shop@shop.holzplast.hu'))->send(new OrderConfirmationMail($order));

        session()->forget('cart');
        return view('shop::success', compact('cart'));
    }

    // Function to remove suffix from array keys
    function removeSuffix($array, $suffix)
    {
        $result = [];
        foreach ($array as $key => $value) {
            $result[substr($key, 0, -strlen($suffix))] = $value;
        }
        return $result;
    }

    public function about() {
        return view('shop::about');
    }

    public function termsAndConditions() {
        return view('shop::terms-and-conditions');
    }

    public function dataPrivacy() {
        return view('shop::data-privacy');
    }
}
