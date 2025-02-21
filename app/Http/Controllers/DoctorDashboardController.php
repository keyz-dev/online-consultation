<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Availability;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorDashboardController extends Controller
{
    public function index(){
        return view('dashboard.doctor.index');
    }

    public function patientsPage(){
        // Fetch all the patients that have been consulted by the doctor
        return view('dashboard.doctor.patients.index');
    }

    public function profile(){
        // Get the doctor information
        $user = Auth::user();
        $doctor = $user->doctor;
        // calculate the age and extract the contacts
        $age = date_diff(date_create($doctor->user->dob), date_create('today'))->y;
        $contacts = $doctor->user->contacts;
        return view('dashboard.doctor.profile.index', compact('doctor', 'age', 'contacts'));
    }
    public function appointments(){
        // Get the doctor information
        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->first();
        return view('dashboard.doctor.appointments.index', compact('doctor'));
    }
    public function chats(){
        // Get the doctor information
        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->first();
        return view('dashboard.doctor.chats.index', compact('doctor'));
    }
    public function calls(){
        // Get the doctor information
        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->first();
        return view('dashboard.doctor.calls.index', compact('doctor'));
    }
}
