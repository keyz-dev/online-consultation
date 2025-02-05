<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQAndARequest;
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
    public function store(StoreQAndARequest $request)
    {
        $validated = $request->validated();
        Q_and_A::create($validated);
        session([
            'status' => 'success',
            "message"=>"Q and A added successfully!"
        ]);
        return redirect()->route("dashboard.admin.q_and_as");
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
    public function update(StoreQAndARequest $request, Q_and_A $q_and_a)
    {
        $validated = $request->validated();
        $q_and_a->update([
            'question' => $validated['question'],
            'answer' => $validated['answer']
        ]);
        session([
           'status' => 'success',
            "message"=>"Q and A updated successfully!"
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Q_and_A $q_and_A)
    {
        $q_and_A->delete();
        session([
           'status' => 'success',
            "message"=>"Q and A deleted successfully!"
        ]);
        return redirect()->back();
    }
}
