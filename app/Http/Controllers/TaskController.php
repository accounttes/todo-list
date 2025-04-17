<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::all();
    }


    public function store(Request $request)
    {
        $task = Task::create($request->validate(['name' => 'required|string']));
        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'Task deleted']);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->validate(['completed' => 'required|boolean']));
        return response()->json($task);
    }
}
