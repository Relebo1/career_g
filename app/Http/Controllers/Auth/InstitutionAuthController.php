<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InstitutionAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.institution-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('institution')->attempt($request->only('email', 'password'))) {
            return redirect()->route('institution.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function showRegistrationForm()
    {
        return view('auth.institution-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:institutions',
            'password' => 'required|confirmed|min:6',
        ]);

        Institution::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('institution')->attempt($request->only('email', 'password'));

        return redirect()->route('institution.dashboard');
    }

    public function logout()
    {
        Auth::guard('institution')->logout();
        return redirect()->route('institution.login');
    }
}
