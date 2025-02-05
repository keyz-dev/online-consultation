<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientDashboardController extends Controller
{
    public function index(){
        return view("dashboard.patient.index");
    }
}
