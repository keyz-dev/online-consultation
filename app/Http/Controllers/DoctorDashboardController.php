<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorDashboardController extends Controller
{
    public function index(){
        return view('dashboard.doctor.index');
    }
}
