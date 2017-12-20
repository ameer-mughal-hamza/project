<?php

namespace App\Http\Controllers;

use App\Degree;
use Illuminate\Http\Request;
use Session;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return "Ameer Hamza";
        $degrees = Degree::all();
        return view('degrees.index')->withDegrees($degrees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255'
        ]);
        $degree = new Degree;
        $degree->name = $request->input('name');
        $degree->save();
        Session::flash('success', 'New Degree created Successfully');
        return redirect()->route('degrees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $degree = Degree::find($id);
        return view('degrees.show')->withDegree($degree);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $degree = Degree::find($id);
        return view('degrees.edit')->withDegree($degree);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $degree = Degree::find($id);

        $this->validate($request, [
            'edit_degree' => 'required|max:255'
        ]);

        $degree->name = $request->input('edit_degree');
        $degree->save();

        Session::flash('success', 'Successfully saved your new Degree!!!!');
        return redirect()->route('degrees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $degree = Degree::find($id);
        $degree->doctors()->detach();
        $degree->delete();
        return redirect()->route('degrees.index');
    }
}
