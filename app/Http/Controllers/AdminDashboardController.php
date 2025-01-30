<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\HealthConcern;
use App\Models\Specialty;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\Notification;
use App\Models\Q_and_A;
use App\Models\Testimonial;

class AdminDashboardController extends Controller
{
    public function index(){
        return view("dashboard.admin.index");
    }
    public function doctors(){
        $doctors = Doctor::all();
        return view('dashboard.admin.doctors.index', compact('doctors'));
    }
    public function specialties(){
        $specialties = Specialty::withCount('doctors')->get();
        return view('dashboard.admin.specialties.index', compact('specialties'));
    }
    public function patients(){
        $patients = Patient::all();
        return view('dashboard.admin.patients.index', compact('patients'));
    }
    public function symptoms(){
        $symptoms = HealthConcern::all();
        return view('dashboard.admin.symptoms.index', compact('symptoms'));
    }
    public function appointments(){
        $appointments = Appointment::all();
        return view('dashboard.admin.appointments.index', compact('appointments'));
    }
    public function consultations(){
        $consultations = Consultation::all();
        return view('dashboard.admin.consultations.index', compact('consultations'));
    }
    public function notifications(){
        $notifications = Notification::all();
        return view('dashboard.admin.notifications.index', compact('notifications'));
    }
    public function q_and_as(){
        $q_and_as = Q_and_A::all();
        return view('dashboard.admin.q_and_as.index', compact('q_and_as'));
    }
    public function testimonials(){
        $testimonials = Testimonial::all();
        return view('dashboard.admin.testimonials.index', compact('testimonials'));
    }
    // Chatting and call pages
    public function chats(){
        return view('dashboard.admin.chats.index');
    }
    public function calls(){
        return view('dashboard.admin.calls.index');
    }
    public function profile(){
        return view('dashboard.admin.profile');
    }
}
