<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSymptomRequest;
use App\Models\HealthConcern;
use Illuminate\Http\Request;
use App\Models\Specialty;
use Illuminate\Support\Facades\Storage;

class HealthConcernController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialties = Specialty::all();
        return view('dashboard.admin.symptoms.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSymptomRequest $request)
    {
        $validated = $request->validated();

        // Save the illustrator for the symptom
        if(isset($validated['icon_url']) && $validated['icon_url'] != null){
            $validated['icon_url'] = $this->file_handler($request, 'icon_url', 'symptoms');
        }

        HealthConcern::create([
            'name' => $validated['name'],
            'icon_url' => $validated['icon_url'],
            'specialty_id' => $validated['specialty_id']
        ]);

        session([
            'status' => 'success',
            "message"=>"Symptom added successfully!"
        ]);
        return redirect()->route('dashboard.admin.symptoms');
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthConcern $healthConcern)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthConcern $symptom)
    {
        $specialties = Specialty::all();
        return view('dashboard.admin.symptoms.edit', compact('symptom', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSymptomRequest $request, HealthConcern $symptom)
    {
        $validated = $request->validated();
        if(isset($validated['icon_url']) && $validated['icon_url'] != null){
            Storage::disk('public')->delete('symptoms/'.$symptom->icon_url);

            $validated['icon_url'] = $this->file_handler($request, 'icon_url', 'symptoms');
        }
        // delete the old svg file

        $symptom->update([
            'name' => $validated['name'],
            'icon_url' => $validated['icon_url'],
            'specialty_id' => $validated['specialty_id']
        ]);

        session([
            'status' => 'success',
            "message"=>"Symptom has been successfully updated"
        ]);

        return redirect()->route('dashboard.admin.symptom.edit', compact('symptom'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthConcern $symptom)
    {
        // delete the old svg file
        Storage::disk('public')->delete('symptoms/'.$symptom->icon_url);
        $symptom->delete();
        session([
            'status' => 'success',
            "message"=>"Symptom has been successfully deleted"
        ]);

        return redirect()->back();
    }
}
