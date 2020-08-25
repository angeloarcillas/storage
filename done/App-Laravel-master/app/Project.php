<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function author()
    {
        // SELECT * FROM user WHERE project_id = 1
        return $this->belongsTo(User::class, 'user_id'); //overide foreign key
    }
}
