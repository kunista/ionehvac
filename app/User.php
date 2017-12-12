<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        # User belongs to Role
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Role');
    }

    public function isUser()
    {

        return $this->role_id == 2;
    }

    public function isAdmin()
    {

        return $this->role_id == 1;
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
