<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// DateTime extension
use Carbon\Carbon;

class author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'dob'];
    protected $dates = ['dob'];

    public function setDobAttribute($dob)
    {
        $this->attributes['dob'] = Carbon::parse($dob);
    }
}
