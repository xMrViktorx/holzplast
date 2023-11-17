<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Shop\Entities\Cart;
use Modules\Admin\Entities\Order;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Illuminate\Contracts\Support\Renderable;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(25);
        return view('admin::order.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $order = Order::find($id);

        if ($order) {
            $billing_address = $order->billing_address;
            $shipping_address = $order->shipping_address;
            return view('admin::order.edit', compact('order', 'billing_address', 'shipping_address'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back();
        }

        $validated = $request->validate([
            'status' => 'required',
        ]);

        if ($validated['status'] == 'canceled') {
            $cart = Cart::where('order_id', $id)->first();
            foreach ($cart->cart_items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->amount += $item->quantity;
                    $product->save();
                }
            }
        }

        $order->update($validated);

        return redirect()->back()->with('success', 'Rendelés sikeresen frissítve!');
    }
}
