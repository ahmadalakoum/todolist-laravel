@extends('layouts.app')
@section('content')
    {{-- view a single task with buttons to edit and delete  as form --}}
    <div class="card">
        <div class="card-header">
            Task #{{ $task->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            <p class="card-text">Due Date: {{ $task->due_date }}</p>
            <p class="card-text">Status: {{ $task->status }}</p>
            <p class="card-text"><small class="text-muted">Created at: {{ $task->created_at }}</small>
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this task?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary ml-2">Back</a>
            </form>
        </div>
    </div>
@endsection
