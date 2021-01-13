<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title','author'];


    public function path($append = 'index')
    {
       return route("books.{$append}", $this->id);
    }
}
