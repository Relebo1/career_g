@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex" style="background-color: #1B2A59; /* Deep Blue */">
    <div class="sidebar" style="width: 15%; background-color: #1B2A59;">
        <h4 class="text-white text-center">Admin Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.institutions') }}">Manage Institutions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('admin.faculties.add')}}">Add Faculties</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.courses.add') }}">Add Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.admissions') }}">View Admissions</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-danger w-100 mt-3">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <main role="main" class="main-content" style="flex: 1; background-color: #28a745; padding: 20px;">
        <div id="contentArea">
            <h2 class="mt-3">Welcome to the Admin Dashboard</h2>
            <p class="text-white">Manage institutions, faculties, and courses.</p>
        </div>
    </main>
</div>

<style>
    body {
        background-color: black; /* Background color */
        color: white; /* Default text color */
    }
    .nav-link:hover {
        background-color: orange; /* Highlight color on hover */
    }
    a {
        text-decoration: none;
        color: azure;
        font-weight: bold;
    }
    li {
        list-style-type: none;
        margin-top: 5px;
    }
</style>
@endsection
