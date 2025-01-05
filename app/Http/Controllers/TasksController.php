<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TasksController extends Controller
{
    // view all tasks
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index')->with('tasks', $tasks);
    }

    // create a new task
    public function create()
    {
        return view('tasks.create');
    }

    // store a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->save();
        return redirect('/');
    }
    public function show(string $id)
    {
        $task = Task::find($id);
        return view('tasks.show')->with('task', $task);
    }
    // edit a task
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->with('task', $task);
    }
    // update a task
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->save();
        return redirect('/');
    }
    // delete a task
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/');
    }
    public function updateStatus(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->status = 'completed';
        $task->save();
        return redirect('/');
    }

}
