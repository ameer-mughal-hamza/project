<?php

namespace App\Http\Controllers\Labortarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabortarianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:labortarian');
    }

    public function labortariandashboard()
    {
        return view('labortarian.dashboard');
    }
}
