<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistical;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function show_dashboard()
    {
        $customers = Customer::all();
        $statisticals = Statistical::all();
        $orders = order::all();
        $products = Product::all();
        $topProductViews = Product::orderByDesc('product_views')->take(10)->get();

        return view('admin.dashboard', compact('customers', 'statisticals', 'orders', 'products', 'topProductViews'));
    }

    /**
     * Filter Statistical by date
     */
    public function filter_by_date(Request $request)
    {
        $data = $request->all();

        $dateFrom = $data['dateFrom'];
        $dateTo = $data['dateTo'];

        $statisticals = Statistical::whereBetween('order_date', [$dateFrom, $dateTo])->orderBy('order_date', 'asc')->get();

        if ($statisticals->count() > 0) {
            foreach ($statisticals as $statistical) {
                $chartData[] = [
                    'period' => $statistical->order_date,
                    'order' => $statistical->total_order,
                    'sales' => $statistical->sales,
                    'profit' => $statistical->profit,
                    'quantity' => $statistical->quantity
                ];
            }

            echo $response = json_encode($chartData);
        } else
            echo $response = json_encode([]);
    }

    /**
     * Filter Statistical by month
     */
    public function filter_by_month(Request $request)
    {
        $lastMonth = Carbon::now()->subMonth()->toDateString();
        $today = Carbon::now()->toDateString();

        $statisticals = Statistical::whereBetween('order_date', [$lastMonth, $today])->orderBy('order_date', 'asc')->get();

        if ($statisticals->count() > 0) {
            foreach ($statisticals as $statistical) {
                $chartData[] = [
                    'period' => $statistical->order_date,
                    'order' => $statistical->total_order,
                    'sales' => $statistical->sales,
                    'profit' => $statistical->profit,
                    'quantity' => $statistical->quantity
                ];
            }

            echo $response = json_encode($chartData);
        } else
            echo $response = json_encode([]);
    }
}
