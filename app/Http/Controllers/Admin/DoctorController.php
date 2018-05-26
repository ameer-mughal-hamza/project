<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Doctor;
use App\Degree;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function __construct()
    {
//        the statement below specify that i want to use
//        doctor auth not default authentication
//        if i use auth only it will use the default web guard
        $this->middleware('auth:admin');
    }

    //Get all users from database and show on index page
    public function index()
    {
        $doctors = Doctor::orderBy('first_name', 'asc')->where('deleted_flag', '0')->take(5)->get();
        return view('admin.doctor.index', ['doctors' => $doctors]);
    }

    //Get all doctors
    public function getAllDoctors()
    {
        $doctors = Doctor::orderBy('first_name', 'asc')->get();
        return view('admin.doctor.doctors', ['doctors' => $doctors]);
    }

    public function showAllDoctors()
    {
        $doctors = Doctor::orderBy('first_name', 'asc')->get();
        return view('admin.doctor.show-all', ['doctors' => $doctors]);
    }

    //Show create page
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $degrees = Degree::all();
        return view('admin.doctor.create', ['categories' => $categories, 'degrees' => $degrees]);
    }

    //Store a user in database
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|alpha_spaces|max:25',
            'last_name' => 'required|alpha_spaces|max:25',
            'password' => 'required|min:8',
            'fee' => 'required|digits_between:2,4',
            'email' => 'required|unique:doctors,email',
            'category' => 'required|unique:doctors,email',
            'education' => 'required|unique:doctors,email',
            'description' => 'required|unique:doctors,email',
        ]);

        $doctor = new Doctor;

        $doctor->first_name = $request->input('first_name');
        $doctor->last_name = $request->input('last_name');
        $doctor->gender = $request->input('gender');
        $doctor->email = $request->input('email');
        $doctor->password = Hash::make($request->password);
        $doctor->description = $request->input('description');
        $doctor->fee = $request->input('fee');
        $doctor->pmdc_verified = $request->input('pmdc_verified');
        $doctor->category = $request->input('category');
        $doctor->education = $request->input('education');

        if ($request->hasFile('upload-image')) {
            $image = $request->file('upload-image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('doctor-images/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $doctor->image_url = $filename;
        }

        $doctor->save();
//        $doctor->categories()->attach($request->input('categories') === null ? [] : $request->input('categories'));
//        $doctor->degrees()->attach($request->input('degrees') === null ? [] : $request->input('degrees'));
        return redirect()->route('doctors.index')->with('info', 'New Doctor Created!');
    }

    //Show a specific doctor
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctor.show', ['doctor' => $doctor]);
    }

    //Give data to edit form
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $degree = Degree::all();
        $category = Category::all();
        return view('admin.doctor.edit', ['doctor' => $doctor, 'doctorId' => $id, 'degree' => $degree, 'categories' => $category]);
    }

    //Update a particular a user
    public function update(Request $request, Doctor $doctor)
    {
        //TODO: Update a user
    }


    //Delete a particular user
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->deleted_flag = '1';
        $doctor->save();
//        if ($doctor->image_url) {
//            $image_url = $doctor->image_url;
//            \File::delete('doctor-images/' . $image_url);
//        }
//        $doctor->degrees()->detach();
//        $doctor->categories()->detach();
//        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}
