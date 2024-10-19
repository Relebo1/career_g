@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4" style="width: 100%; max-width: 500px; background-color: #28a745; border-radius: 10px;">
        <h2 class="text-center text-white mb-4">{{ __('Register Course') }}</h2>
        <form method="POST" action="{{ route('institution.courses.add') }}">
            @csrf

            <!-- Course Name -->
            <div class="form-group mb-3">
                <label for="name" class="form-label text-white">{{ __('Course Name') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group mb-3">
    <label for="faculty_id" class="form-label text-white">{{ __('Select Faculty') }}</label>
    <select name="faculty_id" class="form-control" required>
        @foreach($faculties as $faculty)
            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
        @endforeach
    </select>
</div>


            <button type="submit" class="btn btn-light w-100">{{ __('Register Course') }}</button>
        </form>
    </div>
</div>
@endsection
