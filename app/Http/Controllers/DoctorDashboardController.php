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

    public function availabilityPage(Request $req){
        $week_number = $req->input('week_number');
        //    $activeDoctors = Doctor::scopeActiveAvailabilities("2")->with('user')->get();
        //    dd($activeDoctors);
        $av = Availability::all();
        $doc = Doctor::all();
        $users = User::all();
        $filters = [];
        $array = [];
        $activeDoctors = [];
        $response = [
            "name" => "",
            "city" => "",
            "nationality" => "",
            "profile" => "",
        ];
        foreach($av as $value){
        if($value['status'] == 'active'){
            $filters[] = $value['doctor_id'];
        }
        }
        foreach($doc as $item){
            foreach($filters as $id){
            if($id === $item['id']){
                $array[] = $item['user_id'];
            }
            }
        }
        foreach($users as $user){
            foreach($array as $val){
                if($val === $user['id']){
                $response['name'] = $user['name'];
                $response['city'] = $user['city'];
                $response['nationality'] = $user['Nationality'];
                $response['profile'] = $user['profile_image'];
                $activeDoctors[] = $response;
                }
            }
        }
            // dd($activeDoctors);
        return view('dashboard.doctor.availability.index', compact('activeDoctors'));
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
