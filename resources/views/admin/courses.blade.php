@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ __('Manage Faculties') }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Faculty Form -->
    <div class="card p-4 mb-4" style="background-color: #28a745; border-radius: 10px;">
        <h4 class="text-center">{{ __('Add Course') }}</h4>
        <form method="POST" action="{{ route('admin.courses.add') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">{{ __('Courses Name') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="institution_id">{{ __('Select Institution') }}</label>
                <select name="institution_id" class="form-control" required>
                    <option value="" disabled selected>Select an Institution</option>
                    @foreach($institutions as $institution)
                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="institution_id">{{ __('Select Faculty') }}</label>
                <select name="faculty_id" class="form-control" required>
                    <option value="" disabled selected>Select an Faculty</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">{{ __('Add course') }}</button>
        </form>
    </div>

    <!-- Faculties Table -->
    <h4 class="text-center mb-4">{{ __('Available Faculties') }}</h4>
    <table class="table table-bordered table-hover" style="background-color: #1B2A59; color: white;">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Course Name') }}</th>
                <th>{{ __('Faculty') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $faculty->name }}</td> <!-- Associated institution -->
                    <td>
                        <form action="{{ route('admin.courses.delete', $faculty->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
