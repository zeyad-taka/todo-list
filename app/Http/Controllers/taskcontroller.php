<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class taskcontroller extends Controller
{
    public function index() { return response()->json(Task::all()); }
    public function show($id) { return response()->json(Task::find($id)); }

    public function store(Request $request) {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending'
        ]);
        return response()->json(['message' => 'Task Created', 'task' => $task]);
    }

    public function update(Request $request, $id) {
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json(['message' => 'Task Updated', 'task' => $task]);
    }

    public function destroy($id) {
        Task::destroy($id);
        return response()->json(['message' => 'Task Deleted']);
    }
}