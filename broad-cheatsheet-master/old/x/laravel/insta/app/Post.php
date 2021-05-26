<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function profile()
    // {
    //     return $this->belongsTo(Profile::class);
    // }
    
}

//php artisan tinker
// Post::trucate(); - remove data on table

// [ scale image api ]
// composer require intervention/image
// $img = \Image::make(public_path("storage/{$imagePath}"))->fix(1200,1200); //1200px by 1200px
// $img->save();
