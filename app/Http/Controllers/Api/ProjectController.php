<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $project = Project::with('category', 'technologies')->paginate(3);

        return response()->json([
            'success' => true,
            'project' => $project
        ]);
    }
}
