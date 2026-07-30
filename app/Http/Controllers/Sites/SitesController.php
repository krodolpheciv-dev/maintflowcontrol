<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sites\SitesModel;
use App\Models\Incident\IncidentSubTypeModel;

class SitesController extends Controller
{
    //

     public function getListesitesparid($id)
{
    $subTypes = SitesModel::where('project_id', $id)
        ->where('status', true)
        ->orderBy('site_code')
        ->get(['id', 'site_code']);

    return response()->json($subTypes);
}
}
