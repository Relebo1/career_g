<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multi-User System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e9f5e9; /* Light green background */
            color: #2d2d2d; /* Dark text color */
        }
        .navbar {
            background-color: #4CAF50; /* Green */
        }
        .navbar-brand, .nav-link {
            color: white;
        }
        .btn-success {
            background-color: #4CAF50; /* Green */
            border: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/">Multi-User System</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.login') }}">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.login') }}">Student Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('institution.login') }}">Institution Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
