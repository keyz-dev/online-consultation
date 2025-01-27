<?php

namespace App\Http\Controllers;

use App\Models\HealthConcern;
use Illuminate\Http\Request;

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
        return view('dashboard.admin.symptom.create');
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
    public function show(HealthConcern $healthConcern)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthConcern $healthConcern)
    {
        return view('dashboard.admin.symptom.edit', compact('healthConcern'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthConcern $healthConcern)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthConcern $healthConcern)
    {
        //
    }
}
