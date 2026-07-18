<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureProjectSelected
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('selected_project_id')) {
            return redirect()->route('select.project');
        }

        return $next($request);
    }
}