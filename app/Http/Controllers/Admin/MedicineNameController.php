<?php

namespace App\Http\Controllers\Admin;

use App\MedicineName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class MedicineNameController extends Controller
{
    public function show()
    {
        $medicine_name = MedicineName::where('deleted_flag', '0')->paginate(8);
        return view('medicine.insert')->with('medicine_names', $medicine_name);
    }

    public function store_medicine(Request $request)
    {
//        dd($request->input('type'));
        $this->validate($request, [
            'name' => 'required|unique:medicine_names,medicine_name',
            'type' => 'required'
        ]);
        if ($request->input('type') == 'not-specified') {
            return redirect()->back()->with('info', 'Please specify medicine type.');
        }
        $medicine_name = new MedicineName();
        $medicine_name->medicine_name = $request->input('name');
        $medicine_name->medicine_type = $request->input('type');
        $medicine_name->save();
        return redirect()->route('medicine.show');
    }

    public function delete(Request $request)
    {
//        dd($request->all());
        $medicine_name = MedicineName::find($request->id);
        $medicine_name->deleted_flag = '1';
        if ($medicine_name->save()) {
            Alert::success('Deleted Successfully');
            return redirect()->route('medicine.show');
        }
//        $medicine_name->save();
//        return redirect()->route('medicine.show');
    }
}
