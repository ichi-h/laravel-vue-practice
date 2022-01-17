<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function get()
    {
        return response()->json(Order::find(1));
    }

    public function set(Request $request)
    {
        $order = Order::find(1);
        $order->todo_order = $request->todo_order;
        $order->save();
        return response()->json($order);
    }
}
