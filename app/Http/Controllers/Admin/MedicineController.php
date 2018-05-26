<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Medicine;
use App\Doctor;
use App\Patient;
use Alert;

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

    public function destroy(Request $request)
    {
        $medicine = Medicine::find($request->id);
        $medicine->deleted_flag = '1';
        if ($medicine->save()) {
            Alert::success('Deleted Successfully');
            return redirect()->route('medicine.show');
        }
    }

}
