<?php

namespace App\Http\Controllers\Admin;

use App\Medicine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Doctor;

class PatientController extends Controller
{

    public function show_patient($id)
    {
        $patient = Patient::where('deleted_flag', '0')->find($id);
        $doctor = Doctor::where('id', $patient->doctor_id)->first();
        $medicines = Medicine::where('deleted_flag', '0')->where('patient_id', $id)->get();
        return view('admin.patients.patient')->with(['patient' => $patient, 'doctor' => $doctor, 'medicines' => $medicines]);
    }

    public function show_all_patients()
    {
        $patients = Patient::where('deleted_flag', '0')->paginate(8);
        return view('admin.patients.all-patients')->with('patients', $patients);
    }

    public function show_patient_detail($id)
    {
        $patient = Patient::where('id', $id)->where('doctor_id', Auth::user()->id)->where('deleted_flag', '0')->first();
        $medicines = Medicine::where('patient_id', $id)->where('doctor_id', Auth::user()->id)->get();
        return view('doctors.patient.view_patient_record')->with(['patient' => $patient, 'medicines' => $medicines]);
    }

    public function destroy(Request $request)
    {
        $patient = Patient::find($request->id);
        $patient->deleted_flag = '1';
        $patient->save();
        return redirect()->route('doctor.dashboard');
    }

}
