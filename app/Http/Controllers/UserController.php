<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("user.login");
    }

    public function create(){
        return view("user.register");
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:5',
            'profile_image' => 'nullable|image|mimes:jpg,png,jpeg,webp,ico,svg,jiff|max:2048',
            'phone' => 'required|min:9',
            'whatsapp' => 'required|min:9',
            'Nationality' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'dob' => 'required|date|before_or_equal:today'
        ]);

        if( $validated['gender'] == '1')
            $validated['gender'] = 'male';
        else    
           $validated['gender'] = 'female';
        
        // set the user role
        $validated['role'] = 'admin';
        $validated['profile_image'] = $this->file_handler($request, 'profile_image', 'profile_images');
        
        // Create a new user

        // User::create($validated);    
        // session([
        //     'status' => 'success',
        //     "message"=>"User created successfully!"
        // ]);
        return redirect()->route('user.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Attempt to find the user
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);

            // verify if the request is for a checkout
            if (session()->has('checkout')){
                return redirect()->route('order.create');
            }
            if($user->role_id == 1){
                return redirect()->route('dashboard.index');
            }
            return redirect()->route('home.index');
            // Return the authenticated user info or a redirect 
        } else {
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
