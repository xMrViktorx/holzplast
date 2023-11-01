<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Admin\Entities\Order;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::login');
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
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'A megadott email és jelszó kombináció hibás.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.index');
    }

    public function dashboard()
    {
        $productsNum = Product::all()->count();

        $ordersNum = Order::all()->count();
        $orderTotalIncome = Order::all()->where('status', '!=', 'canceled')->pluck('total_price')->sum();

        // Get the current month's first and last date
        $firstDayOfMonth = Carbon::now()->startOfMonth();
        $lastDayOfMonth = Carbon::now()->endOfMonth();

        // Retrieve orders for the current month and calculate the total price
        $orderMonthlyIncome = Order::where('status', '!=', 'canceled')
            ->whereDate('created_at', '>=', $firstDayOfMonth)
            ->whereDate('created_at', '<=', $lastDayOfMonth)
            ->pluck('total_price')
            ->sum();

        // Get the monthly orders
        $monthlyOrders = Order::all()->groupBy(function ($val) {
            Carbon::setLocale(app()->getLocale());
            return Carbon::parse($val->created_at)->locale(app()->getLocale())->format('M');
        })->take(12);

        $monthlyOrdersMonth = [];
        $monthlyOrdersView = [];
        $monthlyIncomeView = [];

        foreach ($monthlyOrders as $key => $order) {
            $monthlyOrdersMonth[] = $key;
            $monthlyOrdersView[] = $order->count();
            $monthlyIncomeView[] = $order->pluck('total_price')->sum();
        }

        $dashboard = ['productsNum' => $productsNum, 'ordersNum' => $ordersNum, 'orderTotalIncome' => $orderTotalIncome, 'orderMonthlyIncome' => $orderMonthlyIncome];
        return view('admin::dashboard', compact('dashboard', 'monthlyOrdersMonth', 'monthlyOrdersView', 'monthlyIncomeView'));
    }
}
