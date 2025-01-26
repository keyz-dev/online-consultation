<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(){
        return view("dashboard.admin.index");
    }
    public function doctor(){
        return view("dashboard.doctor.index");
    }
    public function patient(){
        return view("dashboard.patient.index");
    }
}
