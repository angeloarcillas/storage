<?php

namespace App\Http\Controllers;

use \App\Project;

class ProjectTaskController extends Controller
{
    public function store(Project $project)
    {
        $project->addTask(request()->validate(['description' => 'required|min:3']));
        return back();
    }
    
}
