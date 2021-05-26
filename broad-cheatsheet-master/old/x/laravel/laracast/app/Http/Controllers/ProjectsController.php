<?php

/*

index - show all
create - create form
store - store
show - show single content
edit - edit form
update - update
destroy - delete
*/

namespace App\Http\Controllers;
    //use should be all unique
// use Illuminate\Filesystem\Filesystem;
use \App\Project;
// use \App\Services\Bar;
// use \App\Mail\ProjectCreated; //use as ProjectCreatedMail for unique name
use \App\Events\ProjectCreated;


class ProjectsController extends Controller
{


    public function __construct()
    {
        // auth()->id() - 123
        // auth()->user() - user
        // auth()->check() - bool
        // auth()->guest() - guest
        // $this->middleware('auth')->only(['store','delete']); //auth only store,delete
        // $this->middleware('auth')->except(['show']); //auth all except show
        
        $this->middleware('auth'); // all
    }

   
    public function index()
    {
        // $projects = Project::all();
        // $projects = Project::where('users_id',auth()->id())->get();
        // $projects = auth()->user()->projects;

        return view('layouts/project', [
            'projects' => auth()->user()->projects
        ]);

        // index.blade.php a href= - $article->path();
    }

    public function create()
    {
        //
       return view('layouts/create');
    }

    public function store()
    {
        //
        //https://laravel.com/docs/5.8/validation
        $attr = request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:3']
             ]);
        $attr['users_id'] = auth()->id();  
        $project = Project::create($attr);
        // Project::create($attr);

            // event(new ProjectCreated($project)); //removed see project class


        // MAIL
    //    \Mail::to('qwerty@zxc.com')->send(
    //     new ProjectCreated($projectInfo));

        // \Mail::to($project->users->email)->send(
        //     new ProjectCreated($project));
       
       return redirect('/project'); //get request
    }

        // [ Filesystem?auto-resolution ]
    // public function show(Filesystem $file)
    // {
    //    dd($file);
    // }

    // [ Service Container ]
    
    // public function show(Project $project,Bar $bar) //Bar $bar -> using class
    // {
            // using bar
    // //   $test = app('bar');
    // //   dd($test);

        // using class
    //   dd($bar);
    // }

    public function show(Project $project)
    {
            // [ AUTH ]
        // abort_unless(auth()->user()->owns($project), 403);
        // abort_if($project->users_id !== auth()->id(),403);

        $this->authorize('view',$project); //method , project
        return view('layouts/show',compact('project'));
    }

    public function edit(Project $project)
    {
        //
        return view('layout/edit',compact('project'));
    }

    public function update(Project $project)
    {
        //
       $project->update($this->validateInput());
        return redirect('/project');

        // see Project model
        // return redirect($project->path());
    }

    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect('/project');
    }

    // CUSTOME FUNCTION 
    public function validateInput()
    {
        return  request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:3']
             ]);
    }
}
