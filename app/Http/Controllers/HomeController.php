<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use App\UserOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $orderChartData = UserOrder::select([
            DB::raw('DATE(user_orders.created_at) as date'),
            DB::raw('SUM(order_items.weight) as qty'),
            DB::raw('SUM(user_orders.user_id) as user_id'),
            DB::raw('order_items.product_id as prod_id'),
            DB::raw('products.name as prod_name')

        ])
            ->join('order_items', 'user_orders.id', 'order_items.user_order_id')
            ->join('products', 'products.id', 'order_items.product_id')
            ->groupBy('date', 'prod_id', 'prod_name', 'user_id')
            ->orderBy('date', 'ASC')
            ->get()
            ->toArray();

        $users = User::all();
        $userorder = UserOrder::all();
        $categoryCount = Category::count();
        $productCount = Product::count();
        $userOrderCount = UserOrder::count();
        $userCount = User::count();
        $products = Product::all()->take(4);
        $categories = Category::all()->take(4);
        return view('home', compact('products', 'categories', 'userCount', 'userOrderCount', 'productCount', 'categoryCount', 'users', 'userorder', 'orderChartData'))->with('id');
    }
}
