<?php

namespace App\Http\Controllers;

use App\Models\Q_and_A;
use Illuminate\Http\Request;

class QAndAController extends Controller
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
        return view('dashboard.admin.q_and_as.create');
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
    public function show(Q_and_A $q_and_a)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Q_and_A $q_and_a)
    {
        return view('dashboard.admin.q_and_as.edit', compact('q_and_a'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Q_and_A $q_and_A)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Q_and_A $q_and_A)
    {
        //
    }
}
