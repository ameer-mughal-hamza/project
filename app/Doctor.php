<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'description',
        'image_url',
        'pmdc_verified',
        'password',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function degrees()
    {
        return $this->belongsToMany('App\Degree');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

}
