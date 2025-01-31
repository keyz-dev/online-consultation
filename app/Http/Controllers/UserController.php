<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ContactInformation;
use Illuminate\Support\Facades\DB;

use App\Models\UserContact;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

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
        DB::transaction(function () use ($request){
            // extract the validated request parameters
            $validated = $request->validated();
    
            if(isset($validated['profile_image']) && $validated['profile_image'] != null){
                $validated['profile_image'] = $this->file_handler($request, 'profile_image', 'profile_images');
            }
            if(isset($request['document']) && $request['document'] != null){
                $validated['document'] = $this->file_handler($request, 'document', 'documents');
            }
            $mass_array = $this->extract_user($validated);
    
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
            session([
                'status' => 'success',
                "message"=>"User created successfully!"
            ]);
            return redirect()->route('user.login');
        });
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
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
