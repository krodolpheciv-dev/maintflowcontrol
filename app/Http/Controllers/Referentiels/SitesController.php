<?php

namespace App\Http\Controllers\Referentiels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class SitesController extends Controller
{
    //

        public function index()
    {
        $projects = Project::latest()->get();
        return view('referentiels.sites', compact('projects'));
    }
}
