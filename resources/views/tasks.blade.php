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
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
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
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Task List -->
        <ul id="taskList" class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $task->id }}">
                    <span>{{ $task->name }}</span>
                    <span>
                        <button class="btn btn-sm btn-warning editTaskBtn" data-id="{{ $task->id }}"
                            data-name="{{ $task->name }}" data-project="{{ $task->project_id }}">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger deleteTaskBtn" data-id="{{ $task->id }}">Delete</button>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Edit Task Modal -->
    @include('modals.edit-task-modal')
@endsection

@section('scripts')
    <script></script>
@endsection
