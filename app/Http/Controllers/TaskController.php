<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Business;
use App\Models\Person;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.index')->with('tasks', Task::open()->paginate(10));
    }

    public function store(TaskRequest $request)
    {
        $target_model = match ($request->input('target_model')) {
            'business' => Business::find($request->input('taskable_id')),
            'person' => Person::find($request->input('taskable_id')),
        };

        $target_model->tasks()->create($request->validated());

        return redirect()->back();
    }

    public function complete(Task $task)
    {
        $task->markAsCompleted();
        return redirect()->back();
    }
}
