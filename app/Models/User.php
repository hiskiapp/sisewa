<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
     * Get the data record associated with the user.
     */
    public function data()
    {
        return $this->hasOne('App\Models\Data');
    }

    public function getStatusAttribute()
    {
        return $this->data()->count();
    }

    public function getInitialAttribute()
    {
        return ucwords(substr($this->name, 0, 1));
    }
}
