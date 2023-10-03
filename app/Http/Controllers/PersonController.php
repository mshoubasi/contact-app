<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('person.index')->with('people', Person::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create')->with('businesses', Business::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'nullable|email',
            'phone'     => 'nullable',
            'business_id' => 'nullable'
        ]);

        Person::create($validated);

        return redirect()->route('person.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        return view('person.edit')->with([
            'person' => $person,
            'businesses' => Business::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'nullable|email',
            'phone'     => 'nullable',
            'business_id' => 'nullable'
        ]);

        $person->update($validated);

        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('person.index');
    }
}
