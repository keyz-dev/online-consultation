<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Models\Availability;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Payment;
use App\Models\ContactInformation;

class DoctorController extends Controller
{
    public $bg;
    public function index()
    {
        // Initial rendering with all the doctors
        $doctors = Doctor::all();
        return $this->render($doctors);
    }

    // Display the page since the search has to work on it
    public function render($doctors){
        $bg = asset('images/bg4.jpg');
        $this->bg = $bg;
        $specialties = Specialty::all();
        return view("home.doctor.index", compact('bg', 'doctors', 'specialties'));
    }

    // function to return the doctors based on the specialty
    public function get_by_specialty(Specialty $specialty){
        $doctors = Doctor::where('specialty_id', $specialty->id)->get();
        return $this->render($doctors);
    }
    
    public function get_by_name(Request $request){
        $validated = $request->validate([
            'doctor_name' => 'required|string'
        ]);
        $name = $validated['doctor_name'];
        // get all users based on the condition
        $users = User::where('name', 'like', '%'. $name. '%')
        ->where('role', 'doctor')->with('doctor')->get();

        // extract the doctor instances from the gotten users
        $doctors = $users->map(function ($user){
            return $user->doctor;
        });
        
        return $this->render($doctors);
    }

    public function get_specialty(Request $request){
        $specialty_id = $request->specialty_id;
        $doctors = Doctor::where('specialty_id', $specialty_id)->get();
        return $this->render($doctors);
    }

    public function create()
    {
        $specialties = Specialty::all();
        return view("home.doctor.register", compact("specialties"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        return DB::transaction(function() use ($request) {
            $validated = $request->validated();
            if(isset($validated['profile_image']) && $validated['profile_image'] != ""){
                $validated['profile_image'] = $this->file_handler($request, 'profile_image', 'profile_images');
            }
            // Extract the user fields and set the role and create the user
            $user_info = $this->extract_user($validated);
            $user_info['role'] = 'doctor';
            $user = User::create($user_info);
    
            // Extract the doctor specific fields, and create a payment
            $doctor_info = $this->extract_doctor($validated);
            $payment = Payment::create([
                'number' => $validated['payment_number'],
                'type' => $validated['payment_type']
            ]);
            // Create respective contacts based on the contact information in the form
            $contacts = ContactInformation::all();
            foreach($validated as $key => $value){
                $contact = $contacts->where('name', $key)->first();
                if( $contact ){
                    $user->contacts()->attach($contact->id, compact('value'));
                }
            }
            // set the doctor payment and user ids and then create the doctor
            $doctor_info['user_id'] = $user->id;
            $doctor_info['payment_id'] = $payment->id;

            Doctor::create($doctor_info);
            session([
                'status' => 'success',
                "message"=>"Account created successfully!"
            ]);
            return redirect()->route('user.login');
        });
    }

    public function extract_doctor($validated){
        $mass_doctor = collect($validated)->only([
            'specialty_id',
            'experience',
            'descriptions',
            'license_number',
            'hospital',
            'consultation_fee' 
        ]);
        return $mass_doctor->toArray();
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        // calculate the age
        $age = date_diff(date_create($doctor->user->dob), date_create('today'))->y;

        $bg = asset('storage/'.$doctor->user->profile_image);
        // extract the contact information

        $contacts = $doctor->user->contacts;
        return view('home.doctor.profile', compact('doctor', 'bg', 'age', 'contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
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
