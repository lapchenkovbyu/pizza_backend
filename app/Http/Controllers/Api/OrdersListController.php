<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrdersListController extends Controller
{
    public function __invoke()
    {
        $orders = Order::latest()->get();

        return response()->json($orders->toArray());
    }
}
