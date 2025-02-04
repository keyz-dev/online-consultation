<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecialtyRequest;
use App\Models\Specialty;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Initial rendering with all the doctors
        $specialties = Specialty::withCount('doctors')->get();
        return $this->render($specialties);
    }

    // Display the page since the search has to work on it
    public function render($specialties){
        $bg = asset('images/bg4.jpg');
        return view("home.specialty.index", compact('bg', 'specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecialtyRequest $request)
    {
        $validated = $request->validated();
        $svg_name = strtolower($validated['name']) . '.svg';
        $svg_content = $validated['icon_url'];
        
        // save the svg to the storage disc public folder
        Storage::disk('public')->put('specialty_icons/'.$svg_name, $svg_content);

        Specialty::create([
            'name' => $validated['name'],
            'noun' => $validated['noun'],
            'icon_url' => $svg_name,
            'description' => $validated['description']
        ]);

        session([
            'status' => 'success',
            "message"=>"Specialty added successfully!"
        ]);

        return redirect()->route('dashboard.admin.specialties');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialty $specialty)
    {
        
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialty $specialty)
    {
        return view('dashboard.admin.specialties.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSpecialtyRequest $request, Specialty $specialty)
    {
        $validated = $request->validated();
        $svg_name = strtolower($validated['name']) . '.svg';
        $svg_content = $validated['icon_url'];
        
        // delete the old svg file
        Storage::disk('public')->delete('specialty_icons/'.$specialty->icon_url);
        
        // save the svg to the storage disc public folder
        Storage::disk('public')->put('specialty_icons/'.$svg_name, $svg_content);

        $specialty->update([
            'name' => $validated['name'],
            'icon_url' => $svg_name,
            'description' => $validated['description']
        ]);
        session([
            'status' => 'success',
            "message"=>"Specialty has been successfully updated"
        ]);

        return redirect()->route('dashboard.admin.specialty.edit', compact('specialty'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialty $specialty)
    {
        Storage::disk('public')->delete('specialty_icons/'.$specialty->icon_url);
        
        $specialty->delete();
        session([
            'status' => 'success',
            "message"=>"Specialty has been successfully deleted"
        ]);

        return redirect()->back();
    }
}
