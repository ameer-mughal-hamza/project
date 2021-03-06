<?php

namespace App\Http\Controllers\Doctor;

use App\Appointment;
use App\Category;
use App\Degree;
use App\Doctor;
use App\Patient;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Image;
use Alert;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use PhpParser\Comment\Doc;
use DB;


class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:doctor');
    }

    public function allAppointments($id)
    {
        if (Auth::user()->id == $id) {
            $appointments = Appointment::where('doctor_id', '=', $id)->take(5)->get();
            return view('doctors/all-appointment')->with(['appointments' => $appointments]);
        }
    }

    public function detailAppointment($id, $appointment_id)
    {
        $patient = Patient::where('id', '=', $id)->first();
        $appointment = Appointment::where('id', '=', $appointment_id)->where('deleted_flag', '=', '0')->first();
        return view('doctors/appointment-detail')->with(['patient' => $patient, 'appointment' => $appointment]);
    }

    public function showSettingPage($id)
    {
        $doctor = Doctor::where('id', '=', $id)->first();
        $timings = explode('||||', $doctor->available_timings);
        return view('doctors.appointment_settings')->with('timings', $timings);
    }

    public function storeTimings(Request $request)
    {
        $doctor = Doctor::find($request->input('doctor_id'));
        $doctor->available_timings = $request->input('timings');
        $doctor->save();
        return response()->json($doctor, 201);
    }

    public function profile($id)
    {
        if (Auth::user()->id == $id) {
            $doctor = Doctor::find($id);
            return view('doctors.profile', ['doctor' => $doctor]);
        }
        return redirect()->back();
    }

    public function showPasswordPage()
    {
        return view('doctors.change-password');
    }

    public function changePassword(Request $request)
    {
        $doctor = Doctor::find($request->input('doctor_id'))->first();
//        dd($admin);
        $password = $doctor->password;
//        dd(Hash::check($request->input('old_password'), $password));
        if (Hash::check($request->input('old_password'), $password)) {
            $doctor->password = Hash::make($request->input('password'));
            $doctor->save();
            if ($doctor->save()) {
                Alert::success('Password Changed Successfully!', "Password Changed")->persistent('Close');
                return redirect()->route('doctor.dashboard');
            }
        }
        Alert::success('Password not changed!', "Password Not Changed :(")->persistent('Close');
        return redirect()->route('doctor.dashboard');
    }

    public function update_doctor(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'first_name' => 'required|alpha_spaces|max:25',
                'last_name' => 'required|alpha_spaces|max:25',
                'fee' => 'required|digits_between:2,4',
                'gender' => 'required',
                'education' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]);
            $doctor = Doctor::find($request->input('id'));
            $doctor->first_name = $request->input('first_name');
            $doctor->last_name = $request->input('last_name');
            $doctor->fee = $request->input('fee');
            $doctor->gender = $request->input('gender');
            $doctor->education = $request->input('education');
            $doctor->category = $request->input('category');
            $doctor->description = $request->input('description');

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('doctor-images/' . $filename);
                Image::make($image)->resize(300, 300)->save($location);
                $doctor->image_url = $filename;
            }

            if ($doctor->save()) {
                Alert::success('Profile Updated Successfully!', "Profile Updated")->persistent('Close');
                return redirect()->route('doctor.dashboard');
            }
        }
    }

    public function doctorDashboard()
    {
        if (Auth::check()) {
            return view('doctors.dashboard');
            $patients = Patient::where('doctor_id', Auth::user()->id)->where('deleted_flag', '0')->take(5)->get();
            return view('doctors.dashboard', ['patients' => $patients]);
        }
        return redirect()->back();
    }

    //Get all users from database and show on index page
    public function index()
    {
        if (Auth::check()) {
            $doctors = Doctor::orderBy('first_name', 'asc')->take(5)->get();
            return view('doctors.index', ['doctors' => $doctors]);
        }
    }

    //Get all doctors
    public function getAllDoctors()
    {
        if (Auth::check()) {

            $doctors = Doctor::orderBy('first_name', 'asc')->get();
            return view('doctors.doctors', ['doctors' => $doctors]);
        }
    }

    public function showAllDoctors()
    {
        if (Auth::check()) {
            $doctors = Doctor::orderBy('first_name', 'asc')->get();
            return view('doctors.show-all', ['doctors' => $doctors]);
        }
    }

    //Show create page
    public function create()
    {
        if (Auth::check()) {
        }
        $categories = Category::all();
        $degrees = Degree::all();
        return view('doctors.create', ['categories' => $categories, 'degrees' => $degrees]);
    }

    //Store a user in database
    public function store(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'first_name' => 'required|max:25',
                'last_name' => 'required|max:25',
                'password' => 'required|min:8',
            ]);

            $doctor = new Doctor;

            $doctor->first_name = $request->input('first_name');
            $doctor->last_name = $request->input('last_name');
            $doctor->gender = $request->input('gender');
            $doctor->email = $request->input('email');
            $doctor->password = Hash::make($request->password);
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
    }

    //Show a specific doctor
    public function show($id)
    {
        if (Auth::check()) {
            $doctor = Doctor::find($id);
            return view('doctors.show', ['doctor' => $doctor]);
        }
    }

    //Give data to edit form
    public function edit($id)
    {
        if (Auth::check()) {
            $doctor = Doctor::find($id);
            $degree = Degree::all();
            $category = Category::all();
            return view('doctors.edit', ['doctor' => $doctor, 'doctorId' => $id, 'degree' => $degree, 'categories' => $category]);
        }
    }

    //Delete a particular user
    public function destroy($id)
    {
        if (Auth::check()) {
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
}
