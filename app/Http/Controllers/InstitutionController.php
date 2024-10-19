<?php
namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitutionController extends Controller
{
    // Show the institution login form
    public function showLoginForm()
    {
        return view('institution.login');
    }

    // Handle institution login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('institution')->attempt($credentials)) {
            return redirect()->route('institution.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }



    public function updateApplicationStatus(Request $request, $id)
{
    $request->validate([
        'action' => 'required',
        'institution_id' => 'required|exists:institutions,id', // Ensure institution_id is provided
    ]);

    $application = Application::findOrFail($id); // Find the application

    // Update the application status based on the action
    switch ($request->action) {
        case 'admit':
            $application->status = 'admitted';
            break;
        case 'reject':
            $application->status = 'rejected';
            break;
    }

    // Create a new admission record
    Admission::create([
        'student_id' => $application->student_id,
        'course_id' => $application->course_id,
        'institution_id' => $request->institution_id, // Include institution_id
        'status' => $application->status,
    ]);

    // Save the application status
    $application->save();

    return redirect()->route('institution.application')->with('success', 'Application status updated successfully!');
}


    public function viewApplications()
    {
        $courses = Course::all();

        $faculties = Faculty::all(); // Get faculties with institutions
        $institutions = Institution::all();
        $applications = Application::with(['student', 'course'])->get();
        return view('institution.applications', compact('applications','faculties','courses'));
    }



    public function storeFaculty(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'institution_id' => 'required|exists:institutions,id', // Ensure institution_id exists
        ]);

        Faculty::create([
            'name' => $request->name,
            'institution_id' => $request->institution_id, // Link to institution
        ]);

        return redirect()->route('institution.dashboard')->with('success', 'Faculty added successfully.');
    }






    public function storeCourse(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'faculty_id' => 'required|exists:faculties,id',
    ]);

    // Get the logged-in institution's ID
    $institutionId = Auth::guard('institution')->id();

    // Create the course and associate it with the selected faculty and the logged-in institution
    Course::create([
        'name' => $request->name,
        'faculty_id' => $request->faculty_id,
        'institution_id' => $institutionId,
    ]);

    return redirect()->route('institution.dashboard')->with('success', 'Course registered successfully!');
}








public function manageFaculties()
    {
        $faculties = Faculty::with('institution')->get(); // Get faculties with institutions
        $institutions = Institution::all();
        return view('institution.faculties', compact('faculties', 'institutions'));
    }







    // Show the course registration form, displaying faculties of the logged-in institution
    public function showCourseForm()
{
    // Fetch faculties of the logged-in institution
    $faculties = Faculty::where('institution_id', Auth::guard('institution')->id())->get();

    // Pass the faculties to the view
    return view('institution.courses', compact('faculties'));
}
    // Store the new course, linking it to the logged-in institution and selected faculty

    // Other methods as previously defined
    public function dashboard()
    {
        $applications = Application::with('student', 'course')->whereHas('course', function ($query) {
            $query->where('institution_id', Auth::id());
        })->get();

        return view('institution.dashboard', compact('applications'));
    }

    public function manageCourses()
    {
        $courses = Course::where('institution_id', Auth::id())->get();
        return view('institution.courses', compact('courses'));
    }

    public function logout()
    {
        Auth::guard('institution')->logout();
        return redirect()->route('institution.login');
    }
}
