<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable; //allow notification //$user->notify(new SubscriptionRenewalFailed)

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects()
    {
       return $this->hasMany(Project::class,'users_id');
    }

    public function isVerified()
    {
        return (bool) $this->email_verified_at; //bool specify datatype
    }
    public function isNotVerified()
    {
        return ! $this->isVerified(); //not verified
    }

    public function team()
    {
        return $this->hasOne(Team::Class);
    }
}
