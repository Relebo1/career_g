@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ __('Applications available') }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover" style="background-color: #1B2A59; color: white;">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Student Name') }}</th>
                <th>{{ __('course') }}</th>
                <th>{{ __('status') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->student->first_name }} {{ $application->student->last_name }}</td>

                    <td>{{ $application->course->name }}</td>

                    <td>{{ $application->status }}</td>
                    <td>
                        <form action="{{ route('institution.admissions.update', $application->id) }}" method="POST">
                            @csrf
                            <button type="submit" name="action" value="admit" class="btn btn-success">
                                <i class="fas fa-check"></i> Admit
                            </button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger">
                                <i class="fas fa-times"></i> Reject
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
