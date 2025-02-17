@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Task Manager</h1>

        <!-- Project Selection -->
        <div class="mb-3">
            <label for="projectSelect" class="form-label">Select Project</label>
            <select id="projectSelect" class="form-select">
                <option value="">All Projects</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ request('project') == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Add Task Form -->
        <div class="mb-4">
            <form id="addTaskForm">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" id="taskName" name="name" class="form-control" placeholder="Task Name"
                            required>
                    </div>
                    <div class="col-md-3">
                        <select id="taskProject" name="project_id" class="form-select">
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="task-btn">Add Task</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Task List -->
        <ul id="taskList" class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $task->id }}">
                    <div class="d-flex align-items-center">
                        <!-- Drag Icon and Priority -->
                        <span class="me-3 text-muted" style="cursor: grab;">&#x2630;</span>
                        <span class="me-2 fw-bold">{{ $task->priority }}</span>
                        <span>{{ $task->name }}</span>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-warning editTaskBtn" data-id="{{ $task->id }}"
                            data-name="{{ $task->name }}" data-project="{{ $task->project_id }}">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger deleteTaskBtn" data-id="{{ $task->id }}">Delete</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Edit Task Modal -->
    @include('modals.edit-task-modal')
@endsection
