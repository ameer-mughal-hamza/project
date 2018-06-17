<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Support\Facades\Mail;
use Mail;

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
        'deleted_flag'
    ];

    public static function sendWelcomeEmail($user, $password)
    {
        // Send email
        Mail::send('verification-mail', ['user' => $user, 'password' => $password], function ($m) use ($user) {
            $m->from('hamza6417307@gmail.com', 'sickbay.com');
            $m->to($user->email, $user->name)->subject('Welcome to Sickbay');
        });
    }

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
