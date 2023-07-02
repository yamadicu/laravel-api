<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){

        if($request->has('category_id')){
            $project = Project::with('category', 'technologies')->where('category_id', $request->category_id)->paginate(3);
        }else{
            $project = Project::with('category', 'technologies')->paginate(3);
        }


        return response()->json([
            'success' => true,
            'project' => $project
        ]);
    }

    public function show($slug){
        $project = Project::with('category', 'technologies')->where('slug', $slug)->first();

        if($project){
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        }else{
            return response()->json([
                'seccess' => false,
                'error' => 'non ci sono progetti'
            ])->setStatusCode(404);
        }
    }
}
