<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function get()
    {
        return response()->json(Todo::all());
    }
}
