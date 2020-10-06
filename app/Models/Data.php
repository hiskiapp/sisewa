<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon', 'name', 'email', 'photo', 'domain', 'file'
    ];

    /**
     * Get the user record associated with the data.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
