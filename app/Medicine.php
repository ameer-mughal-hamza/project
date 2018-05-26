<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['age', 'weight', 'blood_pressure', 'temprature', 'medicine_type', 'medicine_name', 'medicine_quantity'];


    public function patients()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

}
