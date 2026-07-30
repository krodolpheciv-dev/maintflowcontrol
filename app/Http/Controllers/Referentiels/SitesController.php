<?php

namespace App\Http\Controllers\Referentiels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sites\SiteModel;
class SitesController extends Controller
{
    //

        public function index()
    {
        $projects = Project::latest()->get();
        return view('referentiels.sites', compact('projects'));
    }

         public function getListesitesparid($id)
{
    $subTypes = SiteModel::where('project_id', $id)
        ->where('status', true)
        ->orderBy('site_code')
        ->get(['id', 'site_code']);

    return response()->json($subTypes);
}


}
