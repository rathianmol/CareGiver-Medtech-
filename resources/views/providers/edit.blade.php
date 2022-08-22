@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style: none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>Add New Provider</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('providers.update', $provider) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-text">* Required field.</div>
                            <h4 class="mb-3">Personal Information</h4>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name*</label>
                                    <input type="text" class="form-control" name="first_name" value="{{$provider->first_name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" value="{{$provider->middle_name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name*</label>
                                    <input type="text" class="form-control" name="last_name" value="{{$provider->last_name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{$provider->email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" value="{{$provider->phone}}">
                                </div>
                                <h4 class="mb-3">Provider Care Type</h4>
                                <div class="mb-3">
                                    <select class="form-control" name="care_type" id="care_type" onchange="careTypeSelect(this.value);">
                                        <option value="{{$provider->care_type}}" selected="selected">{{$provider->care_type}}</option>
                                        <option value="Primary Care">Primary Care</option>
                                        <option value="Nursing Care">Nursing Care</option>
                                        <option value="Pharmacist">Pharmacist</option>
                                        <option value="Speciality Care">Speciality Care</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select  class="form-control" name="speciality_care_type" id="speciality_care_type" style="display: none;">
                                        {{-- <option value="" selected="selected">Speciality Care Type*</option> --}}
                                        @if($provider->care_type === 'Speciality Care')
                                            <option value="{{$provider->speciality_care_type}}" selected="selected">{{$provider->speciality_care_type}}</option>
                                        @else
                                            <option value="" selected="selected">Speciality Care Type*</option>
                                        @endif
                                        <option value="Allergy and Asthma">Allergy and Asthma</option>
                                        <option value="Anesthesiology">Anesthesiology</option>
                                        <option value="Cardiology">Cardiology</option>
                                        <option value="Dermatology">Dermatology</option>
                                        <option value="Endocrinology">Endocrinology</option>
                                        <option value="Gastroenterology">Gastroenterology</option>
                                        <option value="General">General</option>
                                        <option value="Hematology">Hematology</option>
                                        <option value="Immunology">Immunology Of Columbia</option>
                                        <option value="Infectious">Infectious</option>
                                        <option value="Nephrology">Nephrology</option>
                                        <option value="Neurology">Neurology</option>
                                        <option value="Obstetrics">Obstetrics</option>
                                        <option value="Oncology">Oncology</option>
                                        <option value="Ophthalmology">Ophthalmology</option>
                                        <option value="Orthopedics">Orthopedics</option>
                                        <option value="Otorhinolaryngology">Otorhinolaryngology</option>
                                        <option value="Physical">Physical</option>
                                        <option value="Psychiatry">Psychiatry</option>
                                        <option value="Pulmonary">Pulmonary</option>
                                        <option value="Radiology">Radiology</option>
                                        <option value="Rheumatology">Rheumatology</option>
                                        <option value="Urology">Urology</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        window.onload = function(e){ 
            var careType = document.getElementById("care_type");
            if(careType.value === 'Speciality Care') {
                document.getElementById("speciality_care_type").style.display = "block";
            }
        }

        function careTypeSelect(value) {
            if(value === 'Speciality Care') {
                var specialityDropdown = document.getElementById("speciality_care_type");
                specialityDropdown.style.display = "block";
            } else {
                var specialityDropdown = document.getElementById("speciality_care_type");
                specialityDropdown.style.display = "none";
                specialityDropdown.value = "";
            }
        }
    </script>
@endsection