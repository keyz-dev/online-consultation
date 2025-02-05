<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Availability;
use App\Models\User;

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
        return view('dashboard.doctor.availability', compact('activeDoctors'));
     }
}
