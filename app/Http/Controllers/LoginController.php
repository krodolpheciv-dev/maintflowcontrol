<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class LoginController extends Controller
{
    //


      public function index()
    {
        $projects = Project::latest()->get();
        return view('auth.login', compact('projects'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }


}
