<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{

    use Notifiable;

    protected $fillable = ['patient_email', 'patient_name', 'patient_mobile', 'doctor_id'];

    public function medicines()
    {
        return $this->hasMany('App\Medicine', 'medicine_id');
    }
}
