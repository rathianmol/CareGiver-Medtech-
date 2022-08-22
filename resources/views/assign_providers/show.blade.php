@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Patient Summary and Assignment
                        {{-- <a href="{{route('patients.edit', $patient)}}"><button type="button" class="float-right ms-3 btn btn-primary">Edit</button></a> --}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-3">Patient Information</h5>
                        <dl class="row mb-3">
                            <dt class="col-sm-3 mb-3">Full Name</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->first_name.' '.$patient->middle_name.' '.$patient->last_name}}</dd>
                            <dt class="col-sm-3 mb-3">Gender</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->gender}}</dd>
                            <dt class="col-sm-3 mb-3">Contact</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->email.' '.$patient->phone}}</dd>
                            <dt class="col-sm-3 mb-3">Case</dt>
                            <dd class="col-sm-9 mb-3">{{$patient->case_description}}</dd>

                        </dl>
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
                    <h5 class="card-title mb-3 ms-3">Assign Care Provider</h5>
                    <table class="table table-striped mb-3">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                {{-- <th scope="col">Email</th>
                                <th scope="col">Phone Number</th> --}}
                                <th scope="col">Contact</th>
                                <th scope="col">Care Type</th>
                                {{-- <th scope="col">Availability (Toggle)</th> --}}
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($providers as $provider)
                                <tr>
                                    <td>{{$provider->id}}</td>
                                    <td><a href="{{route('providers.show', $provider)}}">{{$provider->first_name.' '.$provider->last_name}}</a></td>
                                    <td>{{$provider->email.' '.$provider->phone}}</td>
                                    <td>
                                        @if($provider->care_type === 'Speciality Care')
                                            {{$provider->speciality_care_type}}
                                        @else
                                            {{$provider->care_type}}
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('assign_providers.store', [$patient, $provider]) }}" method="POST">
                                            @csrf
                                                {{-- <input type="hidden" value="{{$provider->id}}" name="provider_id"> --}}
                                                <button type="submit" class="btn btn-success btn-sm">Assign</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection