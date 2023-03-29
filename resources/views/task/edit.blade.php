@extends('layouts.app')
@section('title', 'Task')
@section('content')

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5">
        <form method="post" action="{{route('task.update', $task->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="taskName" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="taskName" name="name" value="{{$task->name}}">
            </div>
            <div class="mb-3">
                <label for="taskImage" class="form-label">Task Image</label>
                <input type="file" class="form-control" id="taskImage" name="image">
            </div>

            <select class="form-select" aria-label="Default select example" name="is_complete">
                <option selected hidden>Choose the task status</option>
                <option value=1 {{$task->is_complete == 1 ? 'selected': ''}}>Complete</option>
                <option value=0 {{$task->is_complete == 0 ? 'selected': ''}}>In Complete</option>
            </select>

            <button type="submit" class="mt-3 btn btn-success w-100">Submit</button>
        </form>
    </div>
</div>

@endsection