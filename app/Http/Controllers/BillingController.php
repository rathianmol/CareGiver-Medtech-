<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Patient;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {
        // dd($patient);
        return view('billings.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Patient $patient)
    {
        // dd($request->get('total_charge'));
        // $providerDetail = $patient
        $billing = new Billing;
        $billing->patient_id = $patient->id;
        $billing->provider_detail = $patient->providers()->first()->first_name.' '.$patient->providers()->first()->first_name;
        $billing->service_description = $request->get('service_description');
        $billing->service_description = $request->get('total_charge');
        $billing->service_description = $request->get('total_payment');
        $billing->service_description = $request->get('total_adjustment');
        $billing->service_description = $request->get('account_balance');
        // $billing->service_description = $request->get('service_description');
        // $billing->service_description = $request->get('due_date');
        if(!is_null($request->get('due_date'))) {
            $billing->service_description = $request->get('due_date');
        }
        if((float) $request->get('account_balance') > 0) {
            $billing->status = 0;
        } else {
            $billing->status = 1; // payment complete for this billing
        }
        $billing->save();

        // $patient->providers->sync()
        // $patient->providers()->sync([]);
        // also detach the patient-provider relationship
        return view('discharge.index', compact('patient'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billing $billing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
    }
}
