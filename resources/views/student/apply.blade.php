@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Apply for a Course</h2>

    <form method="POST" action="{{ route('student.apply.store') }}">
        @csrf
        <div class="form-group">
            <label for="course">Select Course</label>
            <select name="course_id" class="form-control" required>
                <option value="" disabled selected>Select a course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>
@endsection
