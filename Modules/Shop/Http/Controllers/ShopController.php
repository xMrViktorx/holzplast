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
                ->paginate(12);
        } else {
            $products = Product::where('status', 1)->orderBy('updated_at', 'desc')->paginate(12);
        }
        return view('shop::index', compact('products'));
    }

    /**
     * Get all categories for the navbar.
     * @return Renderable
     */
    public static function getCategories()
    {
        $categories = Category::where('status', 1)->get();
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
            $products =  $category->products()->where('status', 1)->orderBy('updated_at', 'desc')->paginate(12);
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
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required',
            'address' => 'required',
            'house_number' => 'required',
        ]);

        $cart = '';
        if (session()->has('cart')) {
            $cart = Cart::find(session()->get('cart')->id);
        } else {
            return redirect()->route('cart.index');
        }

        $validated['status'] = 'in progress';
        $validated['total_price'] = $cart->total_price;

        $order = Order::create($validated);

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

        Mail::to($order->email)->bcc(env('ADMIN_ADDRESS'))->send(new OrderConfirmationMail($order));

        session()->forget('cart');
        return view('shop::success', compact('cart'));
    }
}
