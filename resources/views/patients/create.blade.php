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
                        <h4>Add New Patient</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('patients.store') }}">
                            @csrf
                            <div class="form-text">* Required field.</div>
                            <h4 class="mb-3">Personal Information</h4>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name*</label>
                                    <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" value="{{old('middle_name')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name*</label>
                                    <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
                                </div>
                                <div class="mb-3">
                                    <select class="form-control" name="gender">
                                        <option value="" selected="selected">Gender*</option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth*</label>
                                    <input type="date" class="form-control" name="date_of_birth">
                                </div>
                            <h4 class="mb-3">Contact Information</h4>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address*</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number*</label>
                                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="ssn" class="form-label">Social Security Number</label>
                                    <input type="text" class="form-control" name="ssn" value="{{old('ssn')}}">
                                </div>
                            <h4 class="mb-3">Address</h4>
                                <div class="mb-3">
                                    <label for="street" class="form-label">Street*</label>
                                    <input type="text" class="form-control" name="street" value="{{old('street')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">City*</label>
                                    <input type="text" class="form-control" name="city" value="{{old('first_name')}}">
                                </div>
                                <div class="mb-3">
                                    <select  class="form-control" name="state">
                                        <option value="" selected="selected">Select State*</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                        <option value="CO">Colorado</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="DC">District Of Columbia</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="ID">Idaho</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IN">Indiana</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NV">Nevada</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="OH">Ohio</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="OR">Oregon</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="TX">Texas</option>
                                        <option value="UT">Utah</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WA">Washington</option>
                                        <option value="WV">West Virginia</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="zip_code" class="form-label">Zip Code*</label>
                                    <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">
                                </div>
                            <h4 class="mb-3">Case Description</h4>
                                <div class="mb-3 form-group">
                                    <label for="case_description">Case Description</label>
                                    <textarea class="form-control" name="case_description" rows="3">{{ old('case_description') }}</textarea>
                                </div>
                            <h4 class="mb-3">Allergies</h4>
                                <div class="mb-3 form-group">
                                    <label for="food_allergies">Food Allergies</label>
                                    <textarea class="form-control" name="food_allergies" rows="3">{{ old('food_allergies') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="medicine_allergies">Medicine Allergies</label>
                                    <textarea class="form-control" name="medicine_allergies" rows="3">{{ old('medicine_allergies') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="insect_allergies">Insect Allergies</label>
                                    <textarea class="form-control" name="insect_allergies" rows="3">{{ old('insect_allergies') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="other_allergies">Other Allergies</label>
                                    <textarea class="form-control" name="other_allergies" rows="3">{{ old('other_allergies') }}</textarea>
                                </div>
                            <h4 class="mb-3">Illnesses</h4>
                                <div class="mb-3 form-group">
                                    <label for="previous_illnesses">Previous Illnesses</label>
                                    <textarea class="form-control" name="previous_illnesses" rows="3">{{ old('previous_illnesses') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="current_illnesses">Current Illnesses</label>
                                    <textarea class="form-control" name="current_illnesses" rows="3">{{ old('current_illnesses') }}</textarea>
                                </div>
                            <h4 class="mb-3">Physical Condition</h4>
                                <div class="mb-3 form-group">
                                    <label for="physical_disabilities">Physical Disabilities</label>
                                    <textarea class="form-control" name="physical_disabilities" rows="3">{{ old('physical_disabilities') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="respitory_condition">Respitory Condition</label>
                                    <textarea class="form-control" name="respitory_condition" rows="3">{{ old('respitory_condition') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="heart_condition">Heart Condition</label>
                                    <textarea class="form-control" name="heart_condition" rows="3">{{ old('heart_condition') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="hearing_condition">Hearing Condition</label>
                                    <textarea class="form-control" name="hearing_condition" rows="3">{{ old('hearing_condition') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="visual_condition">Visual Condition</label>
                                    <textarea class="form-control" name="visual_condition" rows="3">{{ old('visual_condition') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="siezures">Siezures</label>
                                    <textarea class="form-control" name="siezures" rows="3">{{ old('siezures') }}</textarea>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="current_medications">Current Medications</label>
                                    <textarea class="form-control" name="current_medications" rows="3">{{ old('current_medications') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection