@extends('layouts.app')

@section('content')
<div class="container-fluid p-0 m-0" style="height: 100vh; display: flex; flex-direction: column;">

    <!-- Main Content Wrapper (Sidebar + Content) -->
    <div class="d-flex flex-grow-1">

        <!-- Sidebar -->
        <div class="sidebar" style="background-color: #28a745; width: 180px; padding: 10px; height: 100vh;">
            <h4 class="text-white text-center">Institution Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('institution.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('institution.courses') }}">Manage Courses</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('institution.faculties') }}">Manage Faculties</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('institution.applications') }}">View Applications</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('institution.logout') }}">
                        @csrf
                        <button class="btn btn-danger w-100 mt-3">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-grow-1" style="background-color: #F4F6F7; padding: 20px; overflow-y: auto;">
            <h2 class="text-dark">Welcome to the Institution Dashboard</h2>
            <p class="text-dark">Manage your institution's courses, faculties, and student applications.</p>

            <!-- Additional content for the dashboard goes here -->
        </div>
    </div>
</div>

<style>
    body, html {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
    }

    .sidebar {
        width: 180px;
        padding: 10px;
    }

    .main-content {
        flex-grow: 1;
        padding: 20px;
    }

    .nav {
        margin: 0;
        padding: 0;
    }

    .nav-item {
        margin: 0;
        padding: 5px 0;
    }

    .nav-link:hover {
        background-color: #218838;
    }

    body {
        background-color: #e9ecef;
    }
</style>
@endsection
