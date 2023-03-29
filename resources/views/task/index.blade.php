@extends('layouts.app')
@section('title', 'Task')
@section('content')


<div class="container mt-5">
    <div class="row">
        
        <div class="col-md-4 text-start">
            <form action="{{url('dropdownview')}}" method="post">
                @csrf
            <label>Status</label>
            <select class="form-select" aria-label="Default select example" name="is_complete">
                <option selected hidden>Choose the status</option>
                <option value = 1>Complete</option>
                <option value = 0>In Complete</option>
            </select>
            <button type="submit" class="mt-3 btn btn-success mb-3">Submit</button>
           <a class="btn btn-primary" href="{{route('task.index')}}">Clear</a>
        </form>
       </div>
        <div class="col-md-8 text-end">
            <a href="{{route('task.create')}}" class="btn btn-success btn-sm">Create Task</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task Name</th>
                <th scope="col">Image</th>
                <th scope="col">Is Complete</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <th scope="row">{{$task->id}}</th>
                <td>{{$task->name}}</td>
                <td>
                    <img src="{{asset('images/'.$task->image)}}" alt="" width="40px">
                </td>
                <td>
                    @if($task->is_complete == 1)
                    <span class="badge text-bg-primary">Complete</span>
                    @endif
                    @if($task->is_complete == 0)
                    <span class="badge text-bg-danger">In Complete</span>
                    @endif
                    <!-- (or)
                    <span class="badge {{$task->is_complete == 1 ? 'text-bg-success':'text-bg-danger'}}">
                        {{$task->is_complete == 1 ? 'Active':'In Active'}}
                    </span> -->
                </td>
                <td class="d-flex">
                    <a href="{{route('task.show', $task->id)}}" class="btn btn-sm btn-primary me-2">Show</a>
                    <a href="{{route('task.edit', $task->id)}}" class="btn btn-sm btn-success me-2">Edit</a>
                    <form action="{{route('task.destroy', $task->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection