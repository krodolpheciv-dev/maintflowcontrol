<?php

namespace App\Http\Controllers\Typeincidents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class TypeincidentsController extends Controller
{
    //

        public function index()
    {
        $projects = Project::latest()->get();
        return view('typeincidents.typeincidents', compact('projects'));
    }
}
