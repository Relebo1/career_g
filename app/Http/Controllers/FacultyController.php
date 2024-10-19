<?php

namespace App\Http\Controllers;

use app\Models\Faculty;
use app\Models\Institution;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function manageFaculties()
    {
        $faculties = Faculty::all();
        $institutions = Institution::all();
        return view('institution.faculties', compact('institutions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'institution_id' => 'required|exists:institutions,id']);
        $faculty = Faculty::manageFaculties($request->all());

        $faculty->save();

        return redirect()->route('institution.dashboard')->with('success', 'faculty created successfully');
    }
}
