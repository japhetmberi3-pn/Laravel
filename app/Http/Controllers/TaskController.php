<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
 public function index(Request $request)
    {
        $tasks = Task::where('user_id', Auth::id())
                 ->orderBy('created_at', 'desc')
                 ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:pending,in_progress,done',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create(array_merge($data, ['user_id' => $request->user()->id]));

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json($task, 201);
        }

        return redirect()->route('tasks.index')->with('success', 'Tâche créée.');
    }

    public function destroy(Request $request, Task $task)
    {
        abort_if($task->user_id !== $request->user()->id, 403);
        $task->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['deleted' => true]);
        }

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée.');
    }

    public function updateStatus(Request $request, Task $task)
    {
        abort_if($task->user_id !== $request->user()->id, 403);

        $data = $request->validate(['status' => 'required|in:pending,in_progress,done']);
        $task->update($data);

        return response()->json($task);
    }
   
    public function tasks()
    {
        return $this->hasMany(\App\Models\Task::class);
    }

}   

