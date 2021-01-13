<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use \App\Mail\ProjectCreated as ProjectCreatedMail;
use \App\Events\ProjectCreated;

class Project extends Model
{       

    // protected $fillable = ['title','description']; //user if request->all();
    protected $guarded = []; //anti mass input !note: dont use if request->all();

        //$dispatchesEvent look for eloquent event then trigger
    protected $dispatchesEvents = [
        'created' => ProjectCreated::class
    ];


          // [ EVENT HOOKS ]
    // public static function boot()
    // {
    
    //     parent::boot(); //boots parent class => extends Model

    //     // Eloquent models evants | see observers
    //     static::created(function($project){
            
    //         \Mail::to($project->users->email)->send(
    //             new ProjectCreated($project));
    //     });
    // }

        //function name needs to be same to foreign key => users_id
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
       $this->tasks()->create($task);
    }

    public function path()
    {
        return route('project.index',$this); //$this - current instance
        // add  route/web - Route::resource()->name(project.index)
    }
   
}
