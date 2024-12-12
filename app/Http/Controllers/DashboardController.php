<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetching the last 7 days of sales
        $salesData = $this->getSalesData();

        // Fetching product popularity data (most ordered products)
        $productData = $this->getProductPopularityData();

        // Fetch all orders for display
        $orders = Order::all();

        return view('dashboard', compact('orders', 'salesData', 'productData'));
    }

    private function getSalesData()
    {
        // Get sales data for the last 7 days
        $sales = Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = $sales->pluck('date');
        $totals = $sales->pluck('total');

        return [
            'dates' => $dates,
            'totals' => $totals
        ];
    }

    private function getProductPopularityData()
    {
        // Get product popularity data (most sold products)
        $products = Order::select('product_name', \DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_name')
            ->orderByDesc('total_sold')
            ->limit(5) // You can change this limit based on how many top products you want to show
            ->get();

        $names = $products->pluck('product_name');
        $quantities = $products->pluck('total_sold');

        return [
            'names' => $names,
            'quantities' => $quantities
        ];
    }
}
