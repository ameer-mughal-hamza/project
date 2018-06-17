<?php

namespace App\Http\Controllers\Patient;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Medicine;
use App\Doctor;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Alert;
use PDF;
use Auth;
use PhpParser\Comment\Doc;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:patient');
    }

    public function patientProfile($id)
    {
        if (Auth::check()) {
            $patient = Patient::find($id)->first();
            return view('patients.profile')->with(['patient' => $patient]);
        }
        return redirect()->back();
    }

    public function editProfile(Request $request)
    {
        $this->validate($request, [

        ]);

//        dd($request->all());

        $patient = Patient::find($request->input('id'));

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('patient-images/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $patient->image_url = $filename;
        }

        if ($patient->save()) {
            Alert::success('Profile Updated Successfully!', "Profile Updated")->persistent('Close');
            return redirect()->route('patient.dashboard');
        }

    }

    public function showSetting()
    {
        return view('patients.settings');
    }

    public function changePassword(Request $request)
    {
//        dd($request->all());
        $patient = Patient::find($request->input('patient_id'))->first();
        $password = $patient->password;
//        dd(Hash::check($request->input('old_password'), $password));
        if (Hash::check($request->input('old_password'), $password)) {
            $patient->password = Hash::make($request->input('password'));
            $patient->save();
            if ($patient->save()) {
                Alert::success('Password Changed Successfully!', "Password Changed")->persistent('Close');
                return redirect()->route('patient.dashboard');
            }
        }
        Alert::success('Password not changed!', "Password Not Changed :(")->persistent('Close');
        return redirect()->route('patient.dashboard');
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

    public function appointment($doctor_id, $patient_id)
    {
        Appointment::where('doctor_id', '=', $doctor_id)
            ->where('patient_id', '=', $patient_id)
            ->where('deleted_flag', '=', '0')
            ->get();
        $doctor = Doctor::where('id', '=', $doctor_id)->get();
//        dd($doctor->id);
        $timing = explode('||||', $doctor[0]->available_timings);
//        dd($timing);
        return view('patients.appointment', [
            'timing' => $timing,
            'doctor' => $doctor,
        ]);
    }

    public function getAppointmentTime(Request $request)
    {
        //Jo appointments book hain
        $booked_appointments = Appointment::select('date', 'time')->where('doctor_id', '=', $request->input('doctor_id'))
            ->where('date', $request->input('date'))->get();
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
        $appointment->time = $request->time;
        $appointment->date = $request->date;
        $appointment->reason = $request->reason;
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->save();
        return response()->json($appointment, 201);
    }

}