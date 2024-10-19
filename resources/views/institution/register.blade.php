@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4" style="width: 100%; max-width: 500px; background-color: #28a745; border-radius: 10px;">
        <h2 class="text-center text-white mb-4">{{ __('Register a New Institution') }}</h2>
        <form method="POST" action="{{ route('institution.register') }}">
            @csrf

            <!-- Institution Name -->
            <div class="form-group mb-3">
                <label for="name" class="form-label text-white">{{ __('Institution Name') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Password -->
            <div class="form-group mb-3">
                <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group mb-3">
                <label for="password_confirmation" class="form-label text-white">{{ __('Confirm Password') }}</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-light w-100">{{ __('Register') }}</button>
        </form>
    </div>
</div>
@endsection