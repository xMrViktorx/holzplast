<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Shop\Entities\Cart;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Modules\Shop\Entities\CartItem;
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
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('shop::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('shop::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('shop::edit');
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

            if ($product->amount < $quantity) {
                //TODO swal error
                continue;
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

        //TODO swal success message
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
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
            //TODO swal error
            return redirect()->back();
        }

        if ($product->amount < $request->quantity) {
            //TODO swal error
            return redirect()->back();
        }

        $cartInstance = new Cart();
        $cartInstance->addProduct($request->product_id, $request);
        return redirect()->back();
    }

    /**
     * Remove all item from cart
     * @param int $id
     * @param Request $request
     * @return Renderable
     */
    public function removeAll(Request $request)
    {
        $cart = Cart::find($request->id);
        //TODO Swal are you sure want to remove everything | success message after deleting everything
        if ($cart) {
            $cart->delete();
            return redirect()->back();
        }

        return redirect()->back();
    }
}
