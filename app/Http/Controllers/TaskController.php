<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at','desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $statuses = Task::statuses();
        return view('tasks.create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:' . implode(',', Task::statuses()),
            'due_date' => 'nullable|date',
        ]);

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Tâche créée.');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $statuses = Task::statuses();
        return view('tasks.edit', compact('task','statuses'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:' . implode(',', Task::statuses()),
            'due_date' => 'nullable|date',
        ]);

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée.');
    }
}