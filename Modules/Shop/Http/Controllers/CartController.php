<?php

namespace Modules\Shop\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Shop\Entities\Cart;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Modules\Shop\Entities\CartItem;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cart = '';
        if (session()->has('cart')) {
            $cart = Cart::find(session()->get('cart')->id);
        }

        return view('shop::shopping-cart', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $quantities = $request->input('quantity');
        foreach ($quantities as $itemId => $quantity) {
            $item = CartItem::find($itemId);

            if (!$item) {
                continue;
            }

            $previousQuantity = $item->quantity;

            if ($quantity <= 0) {
                // Restore quantity back to product
                Product::where('id', $item->product_id)->increment('amount', $previousQuantity);
                $item->delete();
                continue;
            }

            $product = Product::find($item->product_id);

            if ($product->amount + $previousQuantity < $quantity) {
                Alert::error($product->name . ' termék hozzáadása nem sikerült!', 'Elérhető mennyiség: ' . $product->amount + $previousQuantity)->showCloseButton();
                return redirect()->back();
            }

            // Restore previous quantity back to product before updating the cart item
            Product::where('id', $item->product_id)->increment('amount', $previousQuantity - $quantity);

            $item->quantity = $quantity;
            $item->total_price = $item->item_price * $quantity;
            $item->save();
        }

        $cartItems = CartItem::where('cart_id', $request->id)->get();
        $cart = Cart::find($request->id);

        $cart->items_count = $cartItems->count();
        $cart->total_price = $cartItems->pluck('total_price')->sum();
        $cart->save();

        if ($cartItems->count() == 0) {
            $cart->delete();
        }

        Alert::success('Kosár sikeresen frissítve!')->showCloseButton();
        return redirect()->back();
    }

    /**
     * Add item to cart
     * @param int $id
     * @param Request $request
     * @return Renderable
     */
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        if (!$product) {
            Alert::error('Termék hozzáadása nem sikerült!', 'Termék nem elérhető')->showCloseButton();
            return redirect()->back();
        }

        $this->checkCartValidity();

        if ($product->amount < $request->quantity) {
            Alert::error('Termék hozzáadása nem sikerült!', 'Elérhető mennyiség: ' . $product->amount)->showCloseButton();
            return redirect()->back();
        }

        $cartInstance = new Cart();
        $cartInstance->addProduct($request->product_id, $request);

        Alert::html(
            "<div class='swal2-icon swal2-success swal2-icon-show text-lg' style='display: flex; margin-top: 0'><div class='swal2-success-circular-line-left' style='background-color: rgb(255, 255, 255);'></div>
            <span class='swal2-success-line-tip'></span> <span class='swal2-success-line-long'></span>
            <div class='swal2-success-ring'></div> <div class='swal2-success-fix' style='background-color: rgb(255, 255, 255);'></div>
            <div class='swal2-success-circular-line-right' style='background-color: rgb(255, 255, 255);'></div>",
            "<span class='text-3xl font-bold text-black'>Termék sikeresen hozzáadva a kosárhoz!</span>" .
                "<div class='flex flex-col gap-2 text-black'>" .
                "<a href='" . route('cart.index') . "' class='bg-backgroundNavbar px-8 py-2 text-lg cursor-pointer rounded shadow-lg hover:bg-backgroundMain outline-none mt-4'>Irány a kosár</a>" .
                "<a href='/' class='bg-backgroundNavbar px-8 py-2 text-lg cursor-pointer rounded shadow-lg hover:bg-backgroundMain outline-none'>Vásárlás folytatása</a>" .
                "</div>"
        )->autoclose(99000);
        return redirect()->back();
    }

    /**
     * Remove all item from cart
     * @param int $id
     * @param Request $request
     * @return Renderable
     */
    public function removeAll()
    {
        $cart = '';
        if (session()->has('cart')) {
            $cart = Cart::find(session()->get('cart')->id);
        }

        if ($cart) {
            foreach ($cart->cart_items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->amount += $item->quantity;
                    $product->save();
                }
            }
            $cart->delete();
            return redirect()->back();
        }

        Alert::success('Kosár sikeresen kiürítve!')->showCloseButton();

        return redirect()->back();
    }

    /**
     * Remove item from cart
     * @param int $id
     * @param Request $request
     * @return Renderable
     */
    public function removeItem($id)
    {
        $cartItem = CartItem::find($id);

        if ($cartItem) {
            $cart_id = $cartItem->cart_id;

            $product = Product::find($cartItem->product_id);
            if ($product) {
                //Set back the product amount because the product is removed from cart
                $product->amount += $cartItem->quantity;
                $product->save();
            }

            $cartItem->delete();

            $cartItems = CartItem::where('cart_id', $cart_id)->get();

            //Cart update with the new items count and total price
            $cart = Cart::find($cart_id);
            $cart->items_count = $cartItems->count();
            $cart->total_price = $cartItems->pluck('total_price')->sum();
            $cart->save();

            //If the last item is removed then delete the cart
            if ($cartItems->count() == 0) {
                $cart->delete();
            }
        }

        Alert::success('Termék sikeresen eltávolítva a kosárból!')->showCloseButton();
        return redirect()->back();
    }

    public function checkCartValidity()
    {
        $carts = Cart::whereNull('order_id')
            ->where('updated_at', '<', Carbon::now()->subHour())
            ->get();

        foreach ($carts as $cart) {
            foreach ($cart->cart_items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->amount += $item->quantity;
                    $product->save();
                }
            }
            $cart->delete();
        }
    }
}
