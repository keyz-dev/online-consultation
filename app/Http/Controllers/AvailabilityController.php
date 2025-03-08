<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all and display the availability status and data of the doctor for the current week and for the next week
        $currentWeekNumber = Carbon::now()->weekOfYear;

        $doctor = Auth::user()->doctor;
        $weekAvailability = $doctor->availabilities();
        $currentWeekAvailability = $weekAvailability->where('week_number', $currentWeekNumber)->first();
        $nextWeekAvailability = $weekAvailability->where('week_number', $currentWeekNumber + 1)->first();

        $cur_id = $currentWeekAvailability->id ?? null;

        // Convert slots arrays to Collections and group by 'day'
        $currentWeekSlots = collect($currentWeekAvailability?->slots ?? [])->groupBy('day') ?? new Collection();
        $nextWeekSlots = collect($nextWeekAvailability?->slots ?? [])->groupBy('day') ?? new Collection();

        // Debugging (optional)

        return view('dashboard.doctor.availability.index', compact('currentWeekAvailability','nextWeekAvailability', 'currentWeekSlots', 'nextWeekSlots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all the patients that have been consulted by the doctor
        return view('dashboard.doctor.set_availability.index');
    }

    public function equivalent(){
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        return view('dashboard.doctor.set_availability.equivalent_setting', compact('days'));
    }

    public function equivalent_store(Request $request){

        // Handle the creation of the equivalent availability
        $validatedData = $request->validate([
            'days' => 'required|array|min:3|max:5', // Must select between 3 and 5 days
            'days.*' => 'string|distinct',
            'duration' => 'required|integer|min:20|max:90',
            'start_hour' => 'required|date_format:H:i',
            'end_hour' => 'required|date_format:H:i|after:start_hour',
            'combined_time_range' => 'nullable|string'
        ]);

        // Custom validation for combined hour range
        $this->validateCombinedHourRange($validatedData);

        // Begin the DB operations
        DB::beginTransaction();

        try{
            // Process the validated data
            $days = $validatedData['days'];
            $duration = (int)$validatedData['duration'];
            $startHour = $validatedData['start_hour'];
            $endHour = $validatedData['end_hour'];
            $currentWeekNumber = (int)Carbon::now()->weekOfYear;

            // Fetch the doctor
            $doctor = Auth::user()->doctor;

            // Create the availability
            $availability = Availability::create([
                'doctor_id' => $doctor->id,
                'status' => 'active',
                'week_number' => $currentWeekNumber
            ]);

            //Use the availability ID to create the various slots
            foreach ($days as $day){
                $start = Carbon::createFromFormat('H:i', $startHour);
                $end = Carbon::createFromFormat('H:i', $endHour);

                while($start->lte($end)){
                    $availability->slots()->create([
                        'day' => $day,
                        'start_time' => $start->format('H:i'),
                        'end_time' => $start->addMinutes($duration)->format('H:i'),
                        'status' => 'available'
                    ]);

                    // Could add some resting time between the sessions
                    // $start->addMinutes($duration);
                }
            }
            // commit the changes made to the DB
            DB::commit();

            session([
                'status' => 'success',
                "message"=>"Availability set successfully"
            ]);
            return redirect()->route('dashboard.doctor.availability');

        }catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors(['combined_time_range' => 'There was an error: '. $e->getMessage()]);
        }
    }

    protected function validateCombinedHourRange(array $data){
        // Convert start and end hours to Carbon instances
        $start = Carbon::createFromFormat('H:i', $data['start_hour']);
        $end = Carbon::createFromFormat('H:i', $data['end_hour']);

        // Calculate the time difference in hours for one day
        $timeDifference = $start->diffInMinutes($end)/60;

        // Multiply by the number of days
        $totalHours = $timeDifference * count($data['days']);

        // Ensure the total hours meet the minimum requirement
        if ($totalHours < 6) {
            $validator = Validator::make([], []); // Create a dummy validator instance
            $validator->errors()->add('combined_time_range', 'The combined hour range must be at least 6 hours.');

            throw new ValidationException($validator);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Availability $availability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Availability $availability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Availability $availability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Availability $availability)
    {
        //
    }
}
