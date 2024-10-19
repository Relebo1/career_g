@extends('layouts.app')


<div class="container-fluid d-flex" style="background-color: #1B2A59;">
    <div class="sidebar" style="width: 250px; background-color: #1B2A59; height: 100vh; position: fixed;">
        <h4 class="text-white text-center mt-3">Student Dashboard</h4>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('student.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('student.apply')}}
                ">Apply for Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('student.admissions') }}">View Admissions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('student.profile.edit') }}">Update Profile</a>
            </li>
            <li class="nav-item mt-5">
                <form method="POST" action="{{ route('student.logout') }}">
                    @csrf
                    <button class="btn btn-danger w-100 mt-3">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <main role="main" class="main-content" style="margin-left: 250px; background-color: #28a745; padding: 20px; width: calc(100% - 250px);">
        <h2 class="mt-3 text-white">Welcome to the Student Dashboard</h2>
        <p class="text-white">Manage your applications and profile.</p>
        <!-- Add more content here as needed -->
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
</style>

