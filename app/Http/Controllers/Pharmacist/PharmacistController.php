<?php

namespace App\Http\Controllers\Pharmacist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PharmacistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pharmacist');
    }

    public function pharmacistdashboard()
    {
        return view('pharmacist.dashboard');
    }
}
