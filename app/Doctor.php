<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
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
}
