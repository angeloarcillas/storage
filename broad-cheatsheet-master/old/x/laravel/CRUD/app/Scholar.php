<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    //
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function addApplicant($request)
    {
        // personal info
        $attributes['owner_id'] = auth()->id();
        $attributes['first_name'] = $request->firstName;
        $attributes['last_name'] = $request->lastName;
        $attributes['birth_date'] = $request->year ."-". $request->month ."-". $request->day;
        $attributes['gender'] = $request->gender;
        $attributes['email'] = $request->email;
        $attributes['contact'] = $request->contactNumber;
        $attributes['employment'] = $request->employment;

        // guardian info
        $attributes['guardian_name'] = $request->guardianName;
        $attributes['guardian_contact'] = $request->guardianContactNumber;

        // scholar info
        $attributes['scholar_type'] = $request->scholarType1 .",".$request->scholarType2 .",".$request->scholarType3;
        $attributes['class_course'] = $request->classCourse;
        $attributes['class_subject'] = $request->classSubject;
        $attributes['class_time'] = $request->classTime;

        $this->create($attributes);
    }
    public function zxc($verifyUser)
    {

       return $attr = [$verifyUser->id,
                    $verifyUser->owner_id,
                    $verifyUser->first_name];

    }
}
