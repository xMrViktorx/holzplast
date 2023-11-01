<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Order;
use Illuminate\Routing\Controller;
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
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
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
        return view('admin::show');
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
            return view('admin::order.edit', compact('order'));
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

        $order->update($validated);

        return redirect()->back()->with('success', 'Rendelés sikeresen frissítve!');
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
}
