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
}
