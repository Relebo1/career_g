<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Career Guidance - Welcome</title>

    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            background-color: #e8f5e9; /* Light green background */
            color: #1B5E20; /* Dark green text color */
            font-family: 'Nunito', sans-serif;
        }

        .navbar {
            background-color: #2E7D32; /* Dark green */
            padding: 15px;
        }

        .navbar-brand {
            color: #fff;
            font-size: 24px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #A5D6A7;
        }

        .content {
            text-align: center;
            margin-top: 100px;
        }

        .title {
            font-size: 64px;
            margin-bottom: 20px;
            color: #1B5E20;
        }

        .buttons {
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            background-color: #388E3C; /* Darker green for buttons */
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin: 10px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #66BB6A; /* Lighter green on hover */
        }

        footer {
            text-align: center;
            margin-top: 100px;
            font-size: 14px;
            color: #388E3C;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="/" class="navbar-brand">Career Guidance</a>
        <div class="nav-links">
            <a href="{{ route('admin.login') }}">Admin Login</a>
            <a href="{{ route('institution.login') }}">Institution Login</a>
            <a href="{{ route('student.login') }}">Student Login</a>
        </div>
    </nav>

    <div class="content">
        <div class="title">
            Welcome to Career Guidance
        </div>
        <p>Your gateway to career success. Explore courses, institutions, and career opportunities.</p>
        <div class="buttons">
            <a href="{{ route('student.register') }}" class="btn">Register as Student</a>
            <a href="{{ route('institution.register') }}" class="btn">Register as Institution</a>
        </div>
    </div>

    <footer>
        &copy; 2024 Career Guidance. All rights reserved.
    </footer>
</body>
</html>
