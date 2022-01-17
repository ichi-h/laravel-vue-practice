<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function get()
    {
        return response()->json(Order::all()[0]);
    }

    public function set(Request $request)
    {
        $order = Order::all()[0];
        $order->todo_order = $request->todo_order;
        $order->save();
        return response()->json($order);
    }
}
