@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Registration Form -->
    <h2 class="text-center mb-4">{{ __('Register a New Institution') }}</h2>
    <div class="card shadow-sm p-4" style="background-color: #28a745; border-radius: 10px;">
        <form method="POST" action="{{ route('admin.institutions.add') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label text-white">{{ __('Institution Name') }}</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-light w-100">{{ __('Register') }}</button>
        </form>
    </div>

    <!-- List of Available Institutions -->
    <h3 class="mt-5">{{ __('Available Institutions') }}</h3>
    <table class="table table-bordered table-hover mt-3" style="background-color: #1B2A59; color: white;">
        <thead style="background-color: #F24C27;">
            <tr>
                <th>#</th>
                <th>Institution Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($institutions as $institution)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $institution->name }}</td>
                    <td>{{ $institution->email }}</td>
                    <td>
                        <form action="{{ route('admin.institutions.delete', $institution->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
