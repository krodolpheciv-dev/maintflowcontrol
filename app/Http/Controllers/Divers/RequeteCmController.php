<?php

namespace App\Http\Controllers\Divers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class RequeteCmController extends Controller
{
    //

        public function index()
    {
        $projects = Project::latest()->get();
        return view('forms.requetescm', compact('projects'));
    }


}
