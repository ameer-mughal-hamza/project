<?php

namespace App\Http\Controllers\Pharmacist;

use App\Doctor;
use App\Medicine;
use App\Patient;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Comment\Doc;

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

    public function showSearchPrescriptionPage()
    {
        return view('pharmacist.prescription.search');
    }

    public function searchPrescription(Request $request)
    {
        $prescription = Medicine::where('patient_id', '=', $request->input('id'))->where('deleted_flag', '=', '0')->get();
        if (count($prescription) > 0) {
            //        dd($prescription[0]['doctor_id']);
            //        if (isset($prescription[0]['doctor_id']))
            $doctor_id = $prescription[0]['doctor_id'];
            $doctor = Doctor::find($doctor_id);
            return view('pharmacist.prescription.search')->with(['prescription' => $prescription, 'doctor' => $doctor]);
        }
        $error = 'No record exist against this id.';
        return view('pharmacist.prescription.search')->with(['error' => $error]);
    }

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

}
