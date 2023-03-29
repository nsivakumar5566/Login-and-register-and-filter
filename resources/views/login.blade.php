@extends('layouts.guest')
@section('title', 'Login')
@section('content')

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5">
        @if (session('message'))
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
        </div>
        @endif
        <form method="post" action="{{url('signIn')}}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>

            <p class="mt-3">Don't have an account? <a href="{{url('register')}}">create new</a></p>
        </form>
    </div>
</div>

@endsection