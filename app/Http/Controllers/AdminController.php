<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        //the statement below specify that i want to use
        //admin auth not default authentication
        //if i use auth only it will use the default web guard
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.admin-home');
    }
}