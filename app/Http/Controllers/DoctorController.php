<?php

namespace App\Http\Controllers;

use App\Category;
use App\Doctor;
use App\Degree;
use Image;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $doctors = Doctor::orderBy('first_name', 'asc')->take(5)->get();
        return view('doctors.index', ['doctors' => $doctors]);
    }

    public function getAllDoctors()
    {
        $doctors = Doctor::orderBy('first_name', 'asc')->get();
        return view('doctors.doctors', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $degrees = Degree::all();
        return view('doctors.create', ['categories' => $categories, 'degrees' => $degrees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|email',
        ]);
        $doctor = new Doctor;

        $doctor->first_name = $request->input('first_name');
        $doctor->last_name = $request->input('last_name');
        $doctor->gender = $request->input('gender');
        $doctor->email = $request->input('email');
        $doctor->description = $request->input('description');
        $doctor->fee = $request->input('fee');
        $doctor->pmdc_verified = $request->input('pmdc_verified');

        if ($request->hasFile('upload-image')) {
            $image = $request->file('upload-image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('doctor-images/' . $filename);
            Image::make($image)->resize(120, 120)->save($location);
            $doctor->image_url = $filename;
        }

        $doctor->save();
        $doctor->categories()->attach($request->input('categories') === null ? [] : $request->input('categories'));
        $doctor->degrees()->attach($request->input('degrees') === null ? [] : $request->input('degrees'));
        return redirect()->route('doctors.index')->with('info', 'New Doctor Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.show')->withDoctor($doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor->image_url) {
            $image_url = $doctor->image_url;
            \File::delete('doctor-images/' . $image_url);
        }
        $doctor->degrees()->detach();
        $doctor->categories()->detach();
        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}
