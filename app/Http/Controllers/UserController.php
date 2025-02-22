<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ContactInformation;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view("user.login");
    }

    public function create(){
        return view("user.register");
    }

    public function store(StoreUserRequest $request){
        DB::beginTransaction();

        try{
            // extract the validated request parameters
            $validated = $request->validated();

            // Extract non_null values from the validated
            $validated = array_filter($validated, function($value){
                return !is_null($value);
            });

            if(isset($validated['profile_image']) && $validated['profile_image'] != null){
                $validated['profile_image'] = $this->file_handler($request, 'profile_image', 'profile_images');
            }
            if(isset($validated['document']) && $validated['document'] != null){
                $validated['document'] = $this->file_handler($request, 'document', 'medical_records');
            }
            $mass_array = $this->extract_user($validated);
            $document = $validated['document'] ?? null;

            // Create a new user
            $user = User::create($mass_array);
            // Get the list of contacts
            $contacts = ContactInformation::all();

            foreach($validated as $key => $value ){
                // get the contact information by name and extract the id, so as to insert into the user_contacts table
                $contact = $contacts->where('name', $key)->first();
                if( $contact ){
                    $user->contacts()->attach($contact->id, compact('value'));
                }
            }
            // The default role is the patient

            // create a patient
            $patient = Patient::create([
                'user_id' => $user->id,
                'document_name' => $document
            ]);

            // commit the changes made to the DB
            DB::commit();

            session([
                'status' => 'success',
                "message"=>"User created successfully!"
            ]);

            return redirect()->route('user.login');

        }catch  (\Exception $e){
            DB::rollBack();
            // Delete aany created images
            Storage::disk('public')->delete('profile_images/'.$user->profile_image);
            Storage::disk('public')->delete('medical_records/'.$patient->document_name);

            return back()->withErrors(['name' => 'Error occured while creating the user.']);
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        $email = $request->email;
        // attempt to find the user based on the email value
        $user = User::with('contacts')->whereHas('contacts', function($query) use ($email) {
            $query->where('value', $email);
        })->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);

            // verify if the request is for booking an appointment
            if (session()->has('appointment_request')){
                // redirect to the booking appointment page
                return redirect()->route('home.doctors');
            }
            if($user->role == "admin"){
                return redirect()->route('dashboard.admin');
            }
            if($user->role == "doctor"){
                return redirect()->route('dashboard.doctor');
            }
            if($user->role == "patient"){
                return redirect()->route('dashboard.patient');
            }
        } else{
            return back()->withErrors(['password' => 'Incorrect Email or Password.']);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home.index');
    }
}
