@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Patient Information
                        <a href="{{route('patients.edit', $patient)}}"><button type="button" class="float-right ms-3 btn btn-primary">Edit</button></a>
                    </div>
                    <div class="card-body">
                        @if($patient->providers()->first())
                            {{-- patient is assigned --}}
                            <table class="table table-striped mb-3" style="background-color: yellow;">
                                <thead>
                                <tr>
                                    <th scope="col">Assigned To</th>
                                    <th scope="col">Care Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$patient->providers()->first()->first_name.' '.$patient->providers()->first()->last_name}}</td>
                                    <td>
                                        @if($patient->providers()->first()->care_type === 'Speciality Care')
                                            {{$patient->providers()->first()->speciality_care_type}}
                                        @else
                                            {{$patient->providers()->first()->care_type}}
                                        @endif
                                    </td>
                                    <td><a href="{{route('billing.create', $patient)}}"><button type="button" class="float-right ms-3 btn btn-success btn-sm">Discharge</button></a></td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                            {{-- patient is not assigned --}}
                        @endif
                        <h5 class="card-title mb-3">Identification</h5>
                        <table class="table table-striped mb-3">
                            <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Last Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$patient->first_name}}</td>
                                <td>{{$patient->middle_name}}</td>
                                <td>{{$patient->last_name}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped mb-3">
                            <thead>
                                <tr>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Social Security Number</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$patient->gender == 'M' ? 'Male' : 'Female'}}</td>
                                    <td>{{$patient->date_of_birth}}</td>
                                    <td>{{$patient->ssn}}</td>
                                </tr>
                                </tbody>
                        </table>
                        <h5 class="card-title mb-3">Contact</h5>
                        <table class="table table-striped mb-3">
                            <thead>
                                <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{$patient->email}}</td>
                                <td>{{$patient->phone}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5 class="card-title mb-3">Case Description</h5>
                        <table class="table table-striped mb-3">
                            <thead>
                                <tr>
                                <th scope="col">Case Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{$patient->case_description}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5 class="card-title mb-3">Address</h5>
                        <table class="table table-striped mb-3">
                            <thead>
                                <tr>
                                <th scope="col">Street</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col">Zip Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{$patient->street}}</td>
                                <td>{{$patient->city}}</td>
                                <td>{{$patient->state}}</td>
                                <td>{{$patient->zip_code}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5 class="card-title mb-3">Allergies</h5>
                        <dl class="row mb-3">
                            <dt class="col-sm-3 mb-3">Food</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->food_allergies}}</dd>
                            <dt class="col-sm-3 mb-3">Medical</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->medicine_allergies}}</dd>
                            <dt class="col-sm-3 mb-3">Insect</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->insect_allergies}}</dd>
                            <dt class="col-sm-3 mb-3">Other</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->other_allergies}}</dd>
                        </dl>

                        <h5 class="card-title mb-3">Illnesses</h5>
                        <dl class="row mb-3">
                            <dt class="col-sm-3 mb-3">Previous</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->previous_illnesses}}</dd>
                            <dt class="col-sm-3 mb-3">Current</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->current_illnesses}}</dd>
                        </dl>

                        <h5 class="card-title mb-3">Physical Condition</h5>
                        <dl class="row mb-3">
                            <dt class="col-sm-3 mb-3">Physical Disabilities</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->physical_disabilities}}</dd>
                            <dt class="col-sm-3 mb-3">Respitory Condition</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->respitory_condition}}</dd>
                            <dt class="col-sm-3 mb-3">Heart Condition</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->heart_condition}}</dd>
                            <dt class="col-sm-3 mb-3">Hearing Condition</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->hearing_condition}}</dd>
                            <dt class="col-sm-3 mb-3">Visual Condition</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->visual_condition}}</dd>
                            <dt class="col-sm-3 mb-3">Siezures</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->siezures}}</dd>
                            <dt class="col-sm-3 mb-3">Current Medications</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->current_medications}}</dd>
                        </dl>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection