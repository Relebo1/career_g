@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4" style="width: 100%; max-width: 500px; background-color: #28a745; border-radius: 10px;">
        <h2 class="text-center text-white mb-4">{{ __('Register a New Faculty') }}</h2>

        <!-- Registration form -->
        <form method="POST" action="{{ route('institution.faculties.add') }}">
            @csrf

            <!-- Select Institution -->
            <div class="form-group mb-3">
                <label for="institution_id" class="form-label text-white">{{ __('Select an Institution') }}</label>
                <select name="institution_id" class="form-control" required>
                    @foreach ($institutions as $institution)
                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Faculty Name -->
            <div class="form-group mb-3">
                <label for="name" class="form-label text-white">{{ __('Faculty Name') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-light w-100">{{ __('Register') }}</button>
        </form>
    </div>
</div>

@endsection
