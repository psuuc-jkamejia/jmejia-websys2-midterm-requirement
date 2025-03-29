@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Task Management</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Details</th>
                <th>Deadline</th>
                <th>Status</th> <!-- Added Status Column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->category }}</td>
                    <td>{{ $task->details }}</td>
                    <td>{{ $task->deadline }}</td>
                    <td>
                        @if ($task->status == 'To-Do')
                            <span class="badge bg-primary">To-Do</span>
                        @elseif ($task->status == 'In Progress')
                            <span class="badge bg-warning text-dark">In Progress</span>
                        @elseif ($task->status == 'Completed')
                            <span class="badge bg-success">Completed</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
