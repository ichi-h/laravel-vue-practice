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
}
