<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Application;

class StudentController extends Controller
{
    // Show the student login form
    public function showLoginForm()
    {
        return view('student.login');
    }

    // Handle student login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('student.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Show student registration form
    public function showRegistrationForm()
    {
        return view('student.register');
    }

    public function showApplicationForm()
{
    $courses = Course::all(); // Fetch all courses
    return view('student.apply', compact('courses')); // Pass the $courses variable to the view
}

public function storeApplication(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id', // Assuming course_id is coming from the form
            // Add any other validation rules as necessary
        ]);

        $application = new Application();
        $application->student_id = Auth::id();
        $application->course_id = $request->course_id;
        $application->status = 'pending'; // Default status
        $application->save();

        return redirect()->route('student.admissions')->with('success', 'Application submitted successfully!');
    }

    // Handle student registration
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::guard('student')->login($student);

        return redirect()->route('student.dashboard');
    }

    public function updateProfile(){

    }
    // Show student dashboard
    public function dashboard()
    {
        return view('student.dashboard');
    }
}
