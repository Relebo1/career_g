@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4" style="width: 100%; max-width: 500px; background-color: #28a745; border-radius: 10px;">
        <h2 class="text-center text-white mb-4">{{ __('Student Login') }}</h2>
        <form method="POST" action="{{ route('student.login') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-light w-100">{{ __('Log in') }}</button>
        </form>
    </div>
</div>
@endsection
