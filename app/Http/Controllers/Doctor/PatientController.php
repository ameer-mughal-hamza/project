<?php

namespace App\Http\Controllers\Doctor;

use App\Medicine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Doctor;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function add_patient(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:patients,email',
            'name' => 'required',
            'mobile' => 'required'
        ]);

        // Generate 6 characters long password
        $password = str_random(6);

        $patient = new Patient();
        $patient->email = $request->email;
        $patient->password = Hash::make($password);
        $patient->patient_name = $request->name;
        $patient->patient_mobile = $request->mobile;
        $patient->doctor_id = $request->doctor_id;

        $patient_save = $patient->save();

        Doctor::sendWelcomeEmail($patient, $password);

        if (!$patient_save) {
            App::abort(500, 'Error');
        }

        return response()->json($patient, 201);
    }

    public function show_patient_detail($id)
    {
        $patient = Patient::where('id', $id)->where('doctor_id', Auth::user()->id)->where('deleted_flag', '0')->first();
        $medicines = Medicine::where('patient_id', $id)->where('doctor_id', Auth::user()->id)->where('deleted_flag', '0')->get();
        return view('doctors.patient.patient')->with(['patient' => $patient, 'medicines' => $medicines]);
    }

    public function show_all_patients()
    {
        $patients = Patient::where('deleted_flag', '0')->where('doctor_id', Auth::user()->id)->paginate(6);
        return view('doctors.patient.all-patients')->with(['patients' => $patients]);
    }

    public function history()
    {
        $medicine = new Medicine();

    }

    public function destroy(Request $request)
    {
        $patient = Patient::find($request->id);
        $patient->deleted_flag = '1';
        $patient->save();
        return redirect()->route('doctor.dashboard');
    }

}
