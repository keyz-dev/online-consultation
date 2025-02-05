<?php

namespace App\Http\Controllers;

use App\Models\Q_and_A;
use App\Models\Doctor;
use App\Models\HealthConcern;
use App\Models\Specialty;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the resources for the home page
        $specialties = Specialty::withcount('doctors')->limit(5)->get();
        $q_and_as = Q_and_A::all();
        $symptoms = HealthConcern::limit(10)->get();
        $hero_bg = asset("images/bg.png");
        $services = $this->get_services();
        $testimonials = Testimonial::all();

        return view("home.index",compact('hero_bg', 'symptoms', 'specialties', 'q_and_as', 'testimonials', 'services'));
    }

    public function get_services(){
        return [
            [
                'name' => "Video Consultation",
                'image' => asset('images/services/consultation.jpg'),
                'description' => "A secure online platform allowing patients to interact with healthcare providers via real-time video, enabling face-to-face consultations from the comfort of home."
            ],
            [
                'name' => "Book Appointment",
                'image' => asset('images/services/appointment.jpg'),
                'description' => 'An easy-to-use scheduling system that allows users(patients and doctors) to schedule, reschedule, or cancel appointments, complete with calendar integration.'
            ],
            [
                'name' => "Manage Notifications",
                'image' => asset('images/services/notification.jpg'),
                'description' => 'Automated notifications via email or SMS to remind patients of upcoming appointments, follow-ups, and important health updates, ensuring they stay informed and engaged.'
            ]
        ];
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id) 
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
