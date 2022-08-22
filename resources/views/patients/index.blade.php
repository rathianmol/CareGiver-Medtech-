@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>Patient Waitlist</h4>
                    </div>
                    <div class="card-body">
                        @if($patients->isNotEmpty())
                            <table class="table table-striped mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $patient)
                                        <tr>
                                            <td>{{$patient->id}}</td>
                                            <td><a href="{{route('patients.show', $patient)}}">{{$patient->first_name.' '.$patient->last_name}}</a></td>
                                            <td>{{$patient->email}}</td>
                                            <td>{{$patient->phone}}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{route('patients.edit', $patient)}}"><button type="button" class="btn btn-primary btn-sm me-2">Edit</button></a>
                                                    <a href="{{route('assign_providers.show', $patient)}}"><button type="button" class="btn btn-info btn-sm me-2">Assign</button></a>
                                                    <form action="{{ route('patients.destroy', $patient) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Patients in the Waitlist.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container div -->
@endsection