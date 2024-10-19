<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Application;
use App\Models\Faculty;
use App\Models\Admin;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show Admin Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Show Login Form for Admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle Admin Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Show Admin Registration Form
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    // Handle Admin Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }

    // Show Institutions and Add New One
    public function showInstitutions()
    {
        $institutions = Institution::all();
        return view('admin.institutions', compact('institutions'));
    }

    // Handle Adding a New Institution
    public function addInstitution(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:institutions',
            'password' => 'required|string|min:8',
        ]);

        Institution::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.institutions')->with('success', 'Institution added successfully.');
    }

    // Manage Faculties
    public function manageFaculties()
    {
        $faculties = Faculty::with('institution')->get(); // Get faculties with institutions
        $institutions = Institution::all();
        return view('admin.faculties', compact('faculties', 'institutions'));
    }

    // Handle Adding a Faculty
    public function addFaculty(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'institution_id' => 'required|exists:institutions,id', // Ensure institution_id exists
        ]);

        Faculty::create([
            'name' => $request->name,
            'institution_id' => $request->institution_id, // Link to institution
        ]);

        return redirect()->route('admin.faculties.add')->with('success', 'Faculty added successfully.');
    }



    public function addCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
            'institution_id' => 'required|exists:institutions,id', // Ensure institution_id exists
        ]);

        Course::create([
            'name' => $request->name,
            'faculty_id' => $request->faculty_id,
            'institution_id'=>$request->institution_id, // Link to institution
        ]);

        return redirect()->route('admin.courses.add')->with('success', 'Faculty added successfully.');
    }

    // Handle Deleting a Faculty
    public function deleteFaculty($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Faculty deleted successfully.');
    }

    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Faculty deleted successfully.');
    }

    public function deleteInstitution($id)
    {
        $faculty = Institution::findOrFail($id);
        $faculty->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Faculty deleted successfully.');
    }

    // Manage Courses
    public function manageCourses()
    {
        $faculties = Faculty::with('institution')->get(); // Get faculties with institutions
        $institutions = Institution::all();
        $courses = Course::with('faculty', 'institution')->get();
        return view('admin.courses', compact('faculties','courses','institutions'));
    }

    // View Applications
    public function viewApplications()
    {
        $applications = Application::with(['student', 'course'])->get();
        return view('admin.applications', compact('applications'));
    }

    // Handle Admin Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
