<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $patients = Patient::all();
        $patients = Patient::orderBy('created_at', 'ASC')->get();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:1',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:patients',
            'phone' => 'required|string|unique:patients',
            'ssn' => 'nullable|numeric',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|min:2|max:2',
            'zip_code' => 'required|string',
            'case_description' => 'required|string|min:3|max:1000',
            'food_allergies' => 'nullable|string|min:3|max:1000',
            'medicine_allergies' => 'nullable|string|min:3|max:1000',
            'insect_allergies' => 'nullable|string|min:3|max:1000',
            'other_allergies' => 'nullable|string|min:3|max:1000',
            'previous_illnesses' => 'nullable|string|min:3|max:1000',
            'current_illnesses' => 'nullable|string|min:3|max:1000',
            'physical_disabilities' => 'nullable|string|min:3|max:1000',
            'respitory_condition' => 'nullable|string|min:3|max:1000',
            'heart_condition' => 'nullable|string|min:3|max:1000',
            'hearing_condition' => 'nullable|string|min:3|max:1000',
            'visual_condition' => 'nullable|string|min:3|max:1000',
            'siezures' => 'nullable|string|min:3|max:1000',
            'current_medications' => 'nullable|string|min:3|max:1000',
        ]);

       if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $patient = Patient::create($request->all());
            return redirect()->route('patients.show', [$patient]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:1',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|string',
            'ssn' => 'nullable|numeric',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|min:2|max:2',
            'zip_code' => 'required|string',
            'case_description' => 'required|string|min:3|max:1000',
            'food_allergies' => 'nullable|string|min:3|max:1000',
            'medicine_allergies' => 'nullable|string|min:3|max:1000',
            'insect_allergies' => 'nullable|string|min:3|max:1000',
            'other_allergies' => 'nullable|string|min:3|max:1000',
            'previous_illnesses' => 'nullable|string|min:3|max:1000',
            'current_illnesses' => 'nullable|string|min:3|max:1000',
            'physical_disabilities' => 'nullable|string|min:3|max:1000',
            'respitory_condition' => 'nullable|string|min:3|max:1000',
            'heart_condition' => 'nullable|string|min:3|max:1000',
            'hearing_condition' => 'nullable|string|min:3|max:1000',
            'visual_condition' => 'nullable|string|min:3|max:1000',
            'siezures' => 'nullable|string|min:3|max:1000',
            'current_medications' => 'nullable|string|min:3|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $patient->update($request->all());
            return redirect()->route('patients.show', [$patient]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->back();
    }
}
