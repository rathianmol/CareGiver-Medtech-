@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>Providers</h4>
                    </div>
                    <div class="card-body">
                        @if($providers->isNotEmpty())
                            <table class="table table-striped mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        {{-- <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th> --}}
                                        <th scope="col">Care Type</th>
                                        <th scope="col">Availability (Toggle)</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($providers as $provider)
                                        <tr>
                                            <td>{{$provider->id}}</td>
                                            <td><a href="{{route('providers.show', $provider)}}">{{$provider->first_name.' '.$provider->last_name}}</a></td>
                                            <td>
                                                @if($provider->care_type === 'Speciality Care')
                                                    Speciality: {{$provider->speciality_care_type}}
                                                @else
                                                    {{$provider->care_type}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($provider->available === 1)
                                                    {{-- Available --}}
                                                    <form action="{{ route('provider_availability.store', $provider) }}" method="POST">
                                                        @csrf
                                                            <input type="hidden" value="1" name="provider_availability">
                                                            <button type="submit" class="btn btn-success btn-sm">Available</button>
                                                    </form>
                                                @else
                                                    {{-- Unavailable --}}
                                                    <form action="{{ route('provider_availability.store', $provider) }}" method="POST">
                                                        @csrf
                                                            <input type="hidden" value="0" name="provider_availability">
                                                            <button type="submit" class="btn btn-warning btn-sm">Unavailable</button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{route('providers.edit', $provider)}}"><button type="button" class="btn btn-primary btn-sm me-2">Edit</button></a>
                                                    {{-- <a href="{{route('providers.destroy', $provider)}}" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger"  value="{{$provider->id}}">Remove</button></a> --}}
                                                    {{-- <a href="{{ route('providers.destroy', $provider) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a> --}}
                                                    <form action="{{ route('providers.destroy', $provider) }}" method="POST">
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
                            <p>No Providers.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container div -->
@endsection