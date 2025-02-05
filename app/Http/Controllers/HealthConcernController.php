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
        $svg_name = strtolower($validated['name']) . '.svg';
        $svg_content = $validated['icon_url'];
        
        // save the svg to the storage disc public folder
        Storage::disk('public')->put('symptom_icons/'.$svg_name, $svg_content);

        HealthConcern::create([
            'name' => $validated['name'],
            'icon_url' => $svg_name,
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
        $svg_name = strtolower($validated['name']) . '.svg';
        $svg_content = $validated['icon_url'];
        
        // delete the old svg file
        Storage::disk('public')->delete('symptom_icons/'.$symptom->icon_url);
        
        // save the svg to the storage disc public folder
        Storage::disk('public')->put('symptom_icons/'.$svg_name, $svg_content);

        $symptom->update([
            'name' => $validated['name'],
            'icon_url' => $svg_name,
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
        Storage::disk('public')->delete('symptom_icons/'.$symptom->icon_url);
        $symptom->delete();
        session([
            'status' => 'success',
            "message"=>"Symptom has been successfully deleted"
        ]);

        return redirect()->back();
    }
}
