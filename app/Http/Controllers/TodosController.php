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

    public function add(Request $request)
    {
        $todo = new Todo();
        $todo->task = $request->task;
        $todo->is_done = false;
        $todo->save();
        return response()->json($todo);
    }

    public function update(Request $request, int $id)
    {
        $todo = Todo::find($id);
        $todo->task = $request->task;
        $todo->is_done = $request->is_done;
        $todo->save();
        return response()->json($todo);
    }

    public function delete(int $id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return response()->json(['id' => $id]);
    }
}
