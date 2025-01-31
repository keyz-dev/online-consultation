<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Payment;
use App\Models\ContactInformation;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Initial rendering with all the doctors
        $doctors = Doctor::all();
        return $this->render($doctors);
    }

    // Display the page since the search has to work on it
    public function render($doctors){
        $bg = asset('images/bg4.jpg');
        $specialties = Specialty::all();
        return view("home.doctor.index", compact('bg', 'doctors', 'specialties'));
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
            if(isset($validated['profile_image']) && $validated['profile_image'] != null){
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
        //
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
}
