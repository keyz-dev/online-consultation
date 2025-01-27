<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view("dashboard.admin.index");
    }
    public function doctors(){
        return view('dashboard.admin.doctors');
    }
    public function specialties(){
        return view('dashboard.admin.specialties');
    }
    public function patients(){
        return view('dashboard.admin.patients');
    }
    public function symptoms(){
        return view('dashboard.admin.symptoms');
    }
    public function appointments(){
        return view('dashboard.admin.appointments');
    }
    public function consultations(){
        return view('dashboard.admin.consultations');
    }
    public function notifications(){
        return view('dashboard.admin.notifications');
    }
    public function q_and_as(){
        return view('dashboard.admin.q_and_as');
    }
    public function testimonials(){
        return view('dashboard.admin.testimonials');
    }
    public function chats(){
        return view('dashboard.admin.chats');
    }
    public function calls(){
        return view('dashboard.admin.calls');
    }
    // Chatting and call pages
}
