@extends('layouts.guest')
@section('title', 'Register')
@section('content')

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5">
        @if (session('message'))
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
        </div>
        @endif
        <form action="{{url('signUp')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>

            <p class="mt-3">Already have an account? <a href="{{url('/')}}">back to login</a></p>
        </form>
    </div>
</div>

@endsection