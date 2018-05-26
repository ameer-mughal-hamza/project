<?php

namespace App\Http\Controllers\Patient;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Medicine;
use App\Doctor;
use Illuminate\Support\Facades\App;
use PDF;
use Auth;
use PhpParser\Comment\Doc;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:patient');
    }

    public function patientdashboard()
    {
        return view('patients.dashboard');
    }

    public function showPatientDetail($id)
    {
        $patient = Patient::where('id', $id)->where('deleted_flag', '0')->first();
        $medicines = Medicine::where('patient_id', $id)->where('doctor_id', Auth::user()->id)->where('deleted_flag', '0')->get();
        $doctor = Doctor::where('id', $patient->doctor_id)->first();
        return view('patients.patient-record')->with(['patient' => $patient, 'medicines' => $medicines, 'doctor' => $doctor]);
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

    public function showDoctorInfoPage($id)
    {
        $doctor = Doctor::all();
        $doctor = $doctor->where('id', $id)->where('deleted_flag', '0')->first();
        $doctorsEducation = explode(' ', $doctor->education);
        return view('patients.showDoctorInfoPage')->with('doctor', $doctor)->with('doctorsEducation', $doctorsEducation);
    }

    public function showAllDoctors()
    {
        $doctors = Doctor::where('deleted_flag', '0')->get();
        return view('patients.doctors')->with(['doctors' => $doctors]);
    }

    public function showDoctor($id)
    {
        $doctor = Doctor::find($id)->first();
        return view('patients.view-doctor', ['doctor' => $doctor]);
    }

    public function appointment($id)
    {
        $doctor = Doctor::find($id)->first();
        $timing = explode('||||', $doctor->available_timings);
        $appointment = Appointment::where('doctor_id', $id)->get();
//        $appointment = Appointment::where('doctor_id', $id)->first();
//        $appointment_time = $appointment->time;
//        dd($appointment->time);
        return view('patients.appointment', ['timing' => $timing,
            'doctor' => $doctor,
            'appointment' => $appointment,
        ]);
    }

    public function getAppointmentTime(Request $request)
    {
        //Jo appointments book hain
        $booked_appointments = Appointment::select('booked_date', 'booked_time')->where('doctor_id', $request->input('doctor_id'))
            ->where('booked_date', $request->input('date'))->get();
        $doctorTimeSlots = Doctor::find($request->input('doctor_id'))->first();

        //Jo Doctor k available time hain
        $doctor_available_timings = explode('||||', $doctorTimeSlots->available_timings);

        return \Response::json([
            'booked_appointments' => $booked_appointments,
            'doctor_available_timings' => $doctor_available_timings,
        ]);
    }

    public function saveAppointment(Request $request)
    {
        $appointment = new Appointment();
        $appointment->booked_time = $request->time;
        $appointment->booked_date = $request->date;
        $appointment->reason = $request->reason;
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->save();
        return response()->json($appointment, 201);
    }

}