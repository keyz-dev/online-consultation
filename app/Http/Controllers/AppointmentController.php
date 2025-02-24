<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Doctor;
use App\Models\Slot;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;



class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to the login page
            session([
                'status' => 'warning',
                "message"=>"You have to login to book an appointment",
                'appointment_request' => "The user wants to book an appointment"
            ]);
            return redirect()->route('user.login');
        }
        // Check if the authenticated user is an patient
        if (Auth::user()->role !== 'patient') {
           abort(403, "Unauthorized action");
        }

        // Return the doctors page
        return redirect()->route('home.doctors');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Doctor $doctor)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to the login page
            session([
                'status' => 'warning',
                "message"=>"You have to login to book an appointment",
                'appointment_request_2' => "The user wants to book an appointment"
            ]);
            return redirect()->route('user.login');
        }
        // Check if the authenticated user is an patient
        if (Auth::user()->role !== 'patient') {
           abort(403, "Unauthorized action");
        }

        // Get the current week number
        $currentWeekNumber = now()->weekOfYear;

        $weekAvailability = $doctor->availabilities();
        $currentWeekAvailability = $weekAvailability->where('week_number', $currentWeekNumber)->first();

        // Convert slots arrays to Collections and group by 'day'
        $currentWeekSlots = collect($currentWeekAvailability?->slots ?? [])->groupBy('day') ?? new Collection();
        $nextWeekSlots = collect($nextWeekAvailability?->slots ?? [])->groupBy('day') ?? new Collection();

        // Return the appointment booking page
        return view('home.appointment.index', compact('doctor', 'currentWeekAvailability', 'currentWeekSlots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Doctor $doctor)
    {
        $doctor_id = $doctor->id;
        $slot_id = (int)$request->slot;
        $patient_id = Auth::user()->patient->id;

        DB::beginTransaction();

        try{
            // Create a pending appointment
            $appointment = Appointment::create([
                'patient_id' => $patient_id,
                'doctor_id' => $doctor_id,
                'slot_id' => $slot_id,
                'status' => 'pending'
            ]);

            // update the slot's status
            $slot = Slot::find($slot_id);
            $slot->update(['status' => 'booked']);
            $slot->save();

            // Notify the Doctor

            // Commit the changes
            DB::commit();
            session([
                'status' => 'success',
                "message"=>"You appointment request has been sent to the doctor. You will be notified of his response"
            ]);
            return redirect()->route('home.index');

        }catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors(['error_display' => 'There was an error: '. $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
