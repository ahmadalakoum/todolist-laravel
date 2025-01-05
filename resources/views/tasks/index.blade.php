@extends('layouts.app')

@section('content')
    {{-- view all tasks with buttons to edit and delete  --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td><a href="/task/{{ $task->id }}">{{ $task->title }}</a></td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>{{ $task->status }}</td>
                                <td>

                                    <!-- Button to mark task as completed -->
                                    {{-- if status is not completed show this button --}}

                                    @if ($task->status != 'completed')
                                        <form action="{{ route('tasks.updatestatus', $task) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit" class="btn btn-success">Mark as Completed</button>
                                        </form>
                                    @endif

                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
