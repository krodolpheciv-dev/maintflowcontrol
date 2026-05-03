<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class DashboardController extends Controller
{
    //

      public function index()
    {
        $projects = Project::latest()->get();
        return view('dashboard.index', compact('projects'));
    }
}
