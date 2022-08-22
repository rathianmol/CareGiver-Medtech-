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
                        <form method="post" action="{{ route('providers.store') }}">
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
                                    <label for="email" class="form-label">Email address*</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number*</label>
                                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                </div>
                                <h4 class="mb-3">Provider Care Type</h4>
                                <div class="mb-3">
                                    <select class="form-control" name="care_type" id="care_type" onchange="careTypeSelect(this.value);">
                                        <option value="" selected="selected">Care Type*</option>
                                        <option value="Primary Care">Primary Care</option>
                                        <option value="Nursing Care">Nursing Care</option>
                                        <option value="Pharmacist">Pharmacist</option>
                                        <option value="Speciality Care">Speciality Care</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select  class="form-control" name="speciality_care_type" id="speciality_care_type" style="display: none;">
                                        <option value="" selected="selected">Speciality Care Type*</option>
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

{{-- 
Allergy and asthma
Anesthesiology -- general anesthesia or spinal block for surgeries and some forms of pain control
Cardiology -- heart disorders
Dermatology -- skin disorders
Endocrinology -- hormonal and metabolic disorders, including diabetes
Gastroenterology -- digestive system disorders
General surgery -- common surgeries involving any part of the body
Hematology -- blood disorders
Immunology -- disorders of the immune system
Infectious disease -- infections affecting the tissues of any part of the body
Nephrology -- kidney disorders
Neurology -- nervous system disorders
Obstetrics/gynecology -- pregnancy and women's reproductive disorders
Oncology -- cancer treatment
Ophthalmology -- eye disorders and surgery
Orthopedics -- bone and connective tissue disorders
Otorhinolaryngology -- ear, nose, and throat (ENT) disorders
Physical therapy and rehabilitative medicine -- for disorders such as low back injury, spinal cord injuries, and stroke
Psychiatry -- emotional or mental disorders
Pulmonary (lung) -- respiratory tract disorders
Radiology -- x-rays and related procedures (such as ultrasound, CT, and MRI)
Rheumatology -- pain and other symptoms related to joints and other parts of the musculoskeletal system
Urology -- disorders of the male reproductive system and urinary tract and the female urinary tract --}}