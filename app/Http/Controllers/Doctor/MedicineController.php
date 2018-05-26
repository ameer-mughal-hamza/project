<?php

namespace App\Http\Controllers\Doctor;

use App\Doctor;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medicine;
use PDF;

class MedicineController extends Controller
{
    public function view_report($id)
    {
        $medicine = Medicine::find($id);
        $patient = Patient::find($medicine->patient_id);
        $doctor = Doctor::find($medicine->doctor_id);
        $medicine_type = explode('||||', $medicine->medicine_type);
        $medicine_name = explode('||||', $medicine->medicine_name);
        $medicine_quantity = explode('||||', $medicine->medicine_quantity);
        $rows = count($medicine_type);
        $pdf = PDF::loadView('doctors.patient.reports', [
            'medicine' => $medicine,
            'patient' => $patient,
            'doctor' => $doctor,
            'medicine_type' => $medicine_type,
            'medicine_name' => $medicine_name,
            'medicine_quantity' => $medicine_quantity,
            'rows' => $rows
        ]);
        return $pdf->stream($patient->patient_name . '-' . $medicine->id . 'pdf');
    }

    public function getMedicineView()
    {
        return view('doctors.patient.prescription');
    }

    public function insert_prescription(Request $request)
    {
        $medicine_prescription = new Medicine();
        $input = $request->all();
        $medicine_prescription->age = $input['age'];
        $medicine_prescription->history = $input['history'];
        $medicine_prescription->weight = $input['weight'];
        $medicine_prescription->temprature = $input['temprature'];
        $medicine_prescription->blood_pressure = $input['bloodpressure'];
        $medicine_prescription->medicine_type = $input['medicine_type'];
        $medicine_prescription->medicine_name = $input['medicine_name'];
        $medicine_prescription->medicine_quantity = $input['medicine_quantity'];
        $medicine_prescription->patient_id = $input['patient_id'];
        $medicine_prescription->doctor_id = $input['doctor_id'];

        $result = $medicine_prescription->save();
        return response()->json($medicine_prescription, 201);
    }

    public function delete(Request $request)
    {
        $medicine = Medicine::find($request->id);
        $medicine->deleted_flag = '1';
        $medicine->save();
        return redirect()->route('doctor.dashboard');
    }

    public function prescribeMedicineToExistingPatient($id)
    {
        $patient = Patient::where('id', $id)->where('doctor_id', Auth::user()->id)->where('deleted_flag', '0')->first();// This will return the name of Patient and Mobile No
        return view('doctors.patient.prescribe_medicine_to_existing_patient')->with('patient', $patient);
    }
}
