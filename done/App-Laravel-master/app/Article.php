<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    // // overide method for Route Model Binding
    // public function getRouteKeyName()
    // {
    //     // return column to query
    //     return 'slug'; // Article::where('slug',$article->first)
    // }

    public function user()
    {
        // SELECT * FROM user WHERE project_id = 1
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        // SELECT * FROM user WHERE project_id = 1
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function path()
    {
        return '/articles/'.$this->id;
    }
}