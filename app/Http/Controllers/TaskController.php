<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $timestamp = strtotime("now");
        $filename = $timestamp . '-' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);

        $task = new Task();
        $task->name = $request->name;
        $task->image = $filename;
        $task->is_complete = $request->is_complete;
        $task->save();

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if ($request->image) {
            if ($task->image) {
                unlink("images/" . $task->image);
            }
            $file = $request->file('image');
            $timestamp = strtotime("now");
            $filename = $timestamp . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        }
        $task = Task::find($task->id);
        $task->name = $request->name;
        if ($request->image) {
            $task->image = $filename;
        }
        $task->is_complete = $request->is_complete;
        $task->save();

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->image) {
            unlink("images/" . $task->image);
        }
        $task->delete();

        return redirect()->route('task.index');
    }
    public function dropdownview(Request $request){
        //echo '<pre>';print_r($request->is_complete);exit;
        $tasks = Task::where('is_complete', $request->is_complete)->get();
        $status = $request->is_complete;
        return view('task.index', compact('tasks'));
       
        
        
    }
}
