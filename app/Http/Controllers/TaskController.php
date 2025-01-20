<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $tasks = Task::when($request->project, function ($query, $projectId) {
            return $query->where('project_id', $projectId);
        })->orderBy('priority')->get();

        return view('tasks', compact('tasks', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);

        $priority = Task::where('project_id', $request->project_id)->max('priority') + 1;

        Task::create([
            'name' => $request->name,
            'priority' => $priority,
            'project_id' => $request->project_id,
        ]);

        return response()->json(['success' => true]);
    }


    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task->update($request->only('name', 'project_id'));

        return response()->json(['success' => true]);
    }
}
