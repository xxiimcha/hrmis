@extends('includes.layout')

@section('content')
    @include('includes.hrmenu')
    @include('includes.new-child')
    @include('includes.newEduc')
    @include('includes.new-cservice')
    @include('includes.new-wexp')
    @include('includes.new-voluntary')
    @include('includes.new-learning')
    @include('includes.new-other-skills')
    @include('includes.new-academic')
    @include('includes.new-membership')
    @include('includes.new-reference')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/welcome/hr/employee/all">Employee</a></li>
                        <li class="breadcrumb-item">All Employees</li>
                        <li class="breadcrumb-item">{{ ucwords($employee->employeeInfo->firstname . ' ' . $employee->employeeInfo->middlename . ' ' . $employee->employeeInfo->lastname) }}</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
                    </ol>
                </nav>

                @include('includes.message')

                <div class="card mb-3 shadow-none">
                    <div class="card-body p-0">
                        <form onsubmit="showLoaderAnimation()" method="POST">
                            {{ csrf_field() }}

                            <input type="text" class="sr-only" value="{{ $employee->employeeFamilyBackground->id }}" name="family_background_id">
                            <input type="text" class="sr-only" value="{{ $employee->employeeFamilyBackground->spouse_info_id }}" name="spouse_info_id">
                            <input type="text" class="sr-only" value="{{ $employee->employeeFamilyBackground->father_info_id }}" name="father_info_id">
                            <input type="text" class="sr-only" value="{{ $employee->employeeFamilyBackground->mother_info_id }}" name="mother_info_id">
                            <input type="text" class="sr-only" value="{{ $employee->employee_personal_information_id }}" name="employee_personal_information_id">
                            <input type="text" class="sr-only" value="{{ $employee->employee_issued_id_id }}" name="employee_issued_id_id">
                            <input type="text" class="sr-only" value="{{ $employee->employeeInfo->employee_per_add_id }}" name="employee_per_add_id">
                            <input type="text" class="sr-only" value="{{ $employee->employeeInfo->employee_res_add_id }}" name="employee_res_add_id">

                            <div class="row">
                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->position }}" id="position" class="form-control form-control-lg" required name="position">
                                        <label class="form-label" for="position" style="margin-left: 0px;">Position <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <select name="department" class="select form-control" data-mdb-filter="true">
                                        <option disabled>Choose Department</option>

                                        @foreach ($departments as $dep)
                                            <option @if($employee->department_id == $dep->id) selected @endif value="{{ $dep->id }}">{{ ucwords($dep->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- [ Part 1: Personal Information -->
                            <p class="mt-2 alert alert-dark bluish_button">I. <span class="fw-bold">Personal Information</span></p>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeInfo->firstname }}" id="pe_firstname" class="form-control form-control-lg no_special_char" required name="firstname">
                                        <label class="form-label" for="pe_firstname" style="margin-left: 0px;">First name <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeInfo->middlename }}" id="pe_middlename" class="form-control form-control-lg no_special_char" required name="middlename">
                                        <label class="form-label" for="pe_middlename" style="margin-left: 0px;">Middle name <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->lastname }}" id="pe_lastname" class="form-control form-control-lg no_special_char" required name="lastname">
                                        <label class="form-label" for="pe_lastname" style="margin-left: 0px;">Surname <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <select name="pe_extension" class="select form-control">
                                        <option disabled @if($employee->employeeInfo->extension == '') selected @endif>Extension</option>
                                        <option value="JR" @if($employee->employeeInfo->extension == 'JR') selected @endif>JR.</option>
                                        <option value="SR" @if($employee->employeeInfo->extension == 'SR') selected @endif>SR.</option>
                                    </select>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="date" value="{{ $employee->employeeInfo->birthday }}" id="pe_birthday" class="form-control form-control-lg active" required name="pe_birthday">
                                        <label class="form-label active" for="pe_birthday" style="margin-left: 0px;">Date of Birth <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->birthPlace }}" id="pe_placeofbirth" class="form-control form-control-lg" required name="pe_placeofbirth">
                                        <label class="form-label" for="pe_placeofbirth" style="margin-left: 0px;">Place of Birth <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <select name="pe_sex" class="select form-control">
                                        <option disabled @if($employee->employeeInfo->sex == '') selected @endif>Sex</option>
                                        <option value="MALE" @if($employee->employeeInfo->sex == 'MALE') selected @endif>Male</option>
                                        <option value="FEMALE" @if($employee->employeeInfo->sex == 'FEMALE') selected @endif>Female</option>
                                    </select>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <select name="pe_civilstatus" class="select form-control">
                                        <option disabled @if($employee->employeeInfo->civilStatus == '') selected @endif>Civil Status</option>
                                        <option value="Single" @if($employee->employeeInfo->civilStatus == 'Single') selected @endif>Single</option>
                                        <option value="Married" @if($employee->employeeInfo->civilStatus == 'Married') selected @endif>Married</option>
                                        <option value="Widowed" @if($employee->employeeInfo->civilStatus == 'Widowed') selected @endif>Widowed</option>
                                    </select>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="number" value="{{ $employee->employeeInfo->height }}" id="pe_height" class="form-control form-control-lg" required name="pe_height">
                                        <label class="form-label" for="pe_height" style="margin-left: 0px;">Height <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="number" value="{{ $employee->employeeInfo->weight }}" id="pe_weight" class="form-control form-control-lg" required name="pe_weight">
                                        <label class="form-label" for="pe_weight" style="margin-left: 0px;">Weight <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <select name="pe_bloodtype" class="select form-control">
                                        <option disabled @if($employee->employeeInfo->bloodType == '') selected @endif>Blood Type</option>
                                        <option value="A" @if($employee->employeeInfo->bloodType == 'A') selected @endif>A</option>
                                        <option value="B" @if($employee->employeeInfo->bloodType == 'B') selected @endif>B</option>
                                        <option value="AB" @if($employee->employeeInfo->bloodType == 'AB') selected @endif>AB</option>
                                        <option value="O" @if($employee->employeeInfo->bloodType == 'O') selected @endif>O</option>
                                    </select>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->gsis }}" id="pe_gsis" class="form-control form-control-lg" required name="pe_gsis">
                                        <label class="form-label" for="pe_gsis" style="margin-left: 0px;">GSIS ID No. <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->pagibig }}" id="pe_pagibig" class="form-control form-control-lg" required name="pe_pagibig">
                                        <label class="form-label" for="pe_pagibig" style="margin-left: 0px;">PAG-IBIG ID No. <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->philhealth }}" id="pe_philhealth" class="form-control form-control-lg" required name="pe_philhealth">
                                        <label class="form-label" for="pe_philhealth" style="margin-left: 0px;">PHILHEALTH No. <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->sss }}" id="pe_sss" class="form-control form-control-lg" required name="pe_sss">
                                        <label class="form-label" for="pe_sss" style="margin-left: 0px;">SSS No. <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->tin }}" id="pe_tin" class="form-control form-control-lg" required name="pe_tin">
                                        <label class="form-label" for="pe_tin" style="margin-left: 0px;">TIN No. <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->employee_number }}" id="pe_employee_number" class="form-control form-control-lg" required name="employee_number">
                                        <label class="form-label" for="pe_employee_number" style="margin-left: 0px;">AGENCY EMPLOYEE No. <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->citizenship }}" id="pe_citizenship" class="form-control form-control-lg" required name="pe_citizenship">
                                        <label class="form-label" for="pe_citizenship" style="margin-left: 0px;">Citizenship <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <p class="small pt-2">** Residential Address **</p>

                                <div class="col-xl-4 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->employeeResAdd->block }}" id="res_block" class="form-control form-control-lg" name="res_block">
                                        <label class="form-label" for="res_block" style="margin-left: 0px;">House/Block/Lot No.</label>
                                    </div>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->employeeResAdd->street }}" id="res_street" class="form-control form-control-lg" name="res_street">
                                        <label class="form-label" for="res_street" style="margin-left: 0px;">Street</label>
                                    </div>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->employeeResAdd->village }}" id="res_village" class="form-control form-control-lg" name="res_village">
                                        <label class="form-label" for="res_village" style="margin-left: 0px;">Subdivision/Village</label>
                                    </div>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <select name="raprov" id="raprov" class="select form-control" data-mdb-filter="true" onchange="modifyAddress('#raprov', '#racm', 'province')">
                                        <option disabled>Province</option>

                                        @foreach ($provinces as $prov)
                                            <option @if($employee->employeeInfo->employeeResAdd->province == $prov->province_code) selected @endif value="{{ $prov->province_code }}">{{ $prov->province_description }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <select name="racm" id="racm" class="select form-control" data-mdb-filter="true" onchange="modifyAddress('#racm', '#rab', 'city')">
                                        <option disabled>City / Municipality</option>

                                        @foreach ($cities as $city)
                                            <option @if($employee->employeeInfo->employeeResAdd->city == $city->city_municipality_code) selected @endif value="{{ $city->city_municipality_code }}">{{ $city->city_municipality_description }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <select name="rab" id="rab" class="select form-control" data-mdb-filter="true">
                                        <option disabled>Baranggay</option>

                                        @foreach ($barangays as $brgy)
                                            <option @if($employee->employeeInfo->employeeResAdd->baranggay == $brgy->barangay_code) selected @endif value="{{ $brgy->barangay_code }}">{{ $brgy->barangay_description }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="number" value="{{ $employee->employeeInfo->employeeResAdd->zipcode }}" id="res_zipcode" class="form-control form-control-lg" required name="res_zipcode">
                                        <label class="form-label" for="res_zipcode" style="margin-left: 0px;">Zip Code <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <p class="small pt-2">** Permanent Address **</p>

                                <div class="col-xl-4 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->employeePerAdd->block }}" id="perm_house" class="form-control form-control-lg" name="perm_house">
                                        <label class="form-label" for="perm_house" style="margin-left: 0px;">House/Block/Lot No.</label>
                                    </div>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->employeePerAdd->street }}" id="perm_street" class="form-control form-control-lg" name="perm_street">
                                        <label class="form-label" for="perm_street" style="margin-left: 0px;">Street</label>
                                    </div>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->employeePerAdd->village }}" id="perm_village" class="form-control form-control-lg" name="perm_village">
                                        <label class="form-label" for="perm_village" style="margin-left: 0px;">Subdivision/Village</label>
                                    </div>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <select name="paprov" id="paprov" class="select form-control" data-mdb-filter="true" onchange="modifyAddress('#paprov', '#pacm', 'province')">
                                        <option disabled>Province</option>

                                        @foreach ($provinces as $prov)
                                            <option @if($employee->employeeInfo->employeePerAdd->province == $prov->province_code) selected @endif value="{{ $prov->province_code }}">{{ $prov->province_description }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <select name="pacm" id="pacm" class="select form-control" data-mdb-filter="true" onchange="modifyAddress('#pacm', '#pab', 'city')">
                                        <option disabled>City / Municipality</option>

                                        @foreach ($cities as $city)
                                            <option @if($employee->employeeInfo->employeePerAdd->city == $city->city_municipality_code) selected @endif value="{{ $city->city_municipality_code }}">{{ $city->city_municipality_description }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <select name="pab" id="pab" class="select form-control" data-mdb-filter="true">
                                        <option disabled>Baranggay</option>

                                        @foreach ($barangays as $brgy)
                                            <option @if($employee->employeeInfo->employeePerAdd->baranggay == $brgy->barangay_code) selected @endif value="{{ $brgy->barangay_code }}">{{ $brgy->barangay_description }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-6 mb-3">
                                    <div class="form-outline">
                                        <input type="number" value="{{ $employee->employeeInfo->employeePerAdd->zipcode }}" id="perm_zipcode" class="form-control form-control-lg" required name="perm_zipcode">
                                        <label class="form-label" for="perm_zipcode" style="margin-left: 0px;">Zip Code <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-7 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->telephone }}" id="pa_telephone" class="form-control form-control-lg" name="pa_telephone">
                                        <label class="form-label" for="pa_telephone" style="margin-left: 0px;">Telephone No.</label>
                                    </div>
                                </div>

                                <div class="col-xl-7 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeInfo->mobile }}" id="pa_mobile" class="form-control form-control-lg" name="pa_mobile">
                                        <label class="form-label" for="pa_mobile" style="margin-left: 0px;">Mobile No.</label>
                                    </div>
                                </div>

                                <div class="col-xl-7 mb-4">
                                    <div class="form-outline">
                                        <input type="email" value="{{ $employee->employeeInfo->email }}" id="pa_email" class="form-control form-control-lg" name="email">
                                        <label class="form-label" for="pa_email" style="margin-left: 0px;">Email</label>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Part 1 ] -->

                            <!-- [ Part 2: Family Background -->
                            <p class="alert alert-dark bluish_button">II. <span class="fw-bold">Family Background</span></p>

                            <div class="row">
                                <p class="small">Spouse's Information</p>

                                <div class="col-xl-6">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeSpouseInfo->firstname }}" id="spouse_firstname" class="form-control form-control-lg no_special_char" name="spouseFirstname">
                                        <label class="form-label" for="spouse_firstname" style="margin-left: 0px;">First name</label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeSpouseInfo->middlename }}" id="spouse_middlename" class="form-control form-control-lg no_special_char" name="spouseMiddlename">
                                        <label class="form-label" for="spouse_middlename" style="margin-left: 0px;">Middle name</label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeSpouseInfo->lastname }}" id="spouse_lastname" class="form-control form-control-lg no_special_char" name="spouseLastname">
                                        <label class="form-label" for="spouse_lastname" style="margin-left: 0px;">Surname</label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <select name="spouseExtension" class="select form-control">
                                        <option disabled @if($employee->employeeFamilyBackground->employeeSpouseInfo->extension == '') selected @endif>Extension</option>
                                        <option value="JR" @if($employee->employeeFamilyBackground->employeeSpouseInfo->extension == 'JR') selected @endif>JR.</option>
                                        <option value="SR" @if($employee->employeeFamilyBackground->employeeSpouseInfo->extension == 'SR') selected @endif>SR.</option>
                                    </select>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeSpouseInfo->occupation }}" id="spouse_occupation" class="form-control form-control-lg" name="spouseOccupation">
                                        <label class="form-label" for="spouse_occupation" style="margin-left: 0px;">Occupation</label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeSpouseInfo->employer }}" id="spouse_employer" class="form-control form-control-lg" name="spouseEmployer">
                                        <label class="form-label" for="spouse_employer" style="margin-left: 0px;">Employer/Business Name</label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeSpouseInfo->busAdd }}" id="spouse_businessadd" class="form-control form-control-lg" name="spouseBusinessAddress">
                                        <label class="form-label" for="spouse_businessadd" style="margin-left: 0px;">Business Address</label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeSpouseInfo->telephone }}" id="spouse_telephone" class="form-control form-control-lg" name="spouseTelephone">
                                        <label class="form-label" for="spouse_telephone" style="margin-left: 0px;">Telephone No.</label>
                                    </div>
                                </div>

                                <p class="small pt-2">Father's Information</p>

                                <div class="col-xl-6">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeFatherInfo->firstname }}" id="father_firstname" class="form-control form-control-lg no_special_char" required name="fatherFirstname">
                                        <label class="form-label" for="father_firstname" style="margin-left: 0px;">First name <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeFatherInfo->middlename }}" id="father_middlename" class="form-control form-control-lg no_special_char" required name="fatherMiddlename">
                                        <label class="form-label" for="father_middlename" style="margin-left: 0px;">Middle name <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeFatherInfo->lastname }}" id="father_lastname" class="form-control form-control-lg no_special_char" required name="fatherLastname">
                                        <label class="form-label" for="father_lastname" style="margin-left: 0px;">Surname <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6 mb-2">
                                    <select name="fatherExtension" class="select form-control">
                                        <option disabled @if($employee->employeeFamilyBackground->employeeFatherInfo->extension == '') selected @endif>Extension</option>
                                        <option value="JR" @if($employee->employeeFamilyBackground->employeeFatherInfo->extension == 'JR') selected @endif>JR.</option>
                                        <option value="SR" @if($employee->employeeFamilyBackground->employeeFatherInfo->extension == 'SR') selected @endif>SR.</option>
                                    </select>
                                </div>

                                <p class="small pt-2">Mother's Information</p>

                                {{-- <div class="col-xl-6">
                                    <div class="form-outline mb-2">
                                        <input type="text" id="mother_maiden" class="form-control form-control-lg no_special_char" required name="motherMaiden">
                                        <label class="form-label" for="mother_maiden" style="margin-left: 0px;">Maiden name <small class="text-muted">(required)</small></label>
                                    </div>
                                </div> --}}

                                <div class="col-xl-4">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeMotherInfo->firstname }}" id="mother_firstname" class="form-control form-control-lg no_special_char" required name="motherFirstname">
                                        <label class="form-label" for="mother_firstname" style="margin-left: 0px;">First name <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeMotherInfo->middlename }}" id="mother_middlename" class="form-control form-control-lg no_special_char" required name="motherMiddlename">
                                        <label class="form-label" for="mother_middlename" style="margin-left: 0px;">Middle name <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-4 mb-2">
                                    <div class="form-outline">
                                        <input type="text" value="{{ $employee->employeeFamilyBackground->employeeMotherInfo->lastname }}" id="mother_lastname" class="form-control form-control-lg no_special_char" required name="motherLastname">
                                        <label class="form-label" for="mother_lastname" style="margin-left: 0px;">Surname <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <p class="small pt-2 d-flex align-items-center justify-content-between">
                                    Name of children (Write full name & list all)  <button type="button" data-mdb-toggle="modal" data-mdb-target="#newChild" class="btn btn-sm btn-primary">add</button>
                                </p>
                            </div>

                            <ul id="newChildContainer">
                                @foreach ($employee->employeeFamilyBackground->employeeChildren as $children)
                                    <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $children->name }}" name="childName[]" type="text" class="sr-only" >
                                            <input value="{{ $children->birthday }}" name="childBday[]" type="text" class="sr-only" >

                                            <div>
                                                Name: {{ $children->name }}<br>Birthday: {{ $children->birthday }}
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- End of Part 2 ] -->

                            <!-- [ Part 3: Educational Background-->
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>III. <span class="fw-bold text-warning">Educational Background</span></span>
                                <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newEduc">add</button>
                            </div>

                            <ul id="newEducContainer">
                                @foreach ($employee->employeeEducation as $educ)
                                    <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $educ->level }}" name="educLevel[]" type="text" class="sr-only" >
                                            <input value="{{ $educ->school_name }}" name="educSchoolName[]" type="text" class="sr-only" >
                                            <input value="{{ $educ->degree }}" name="educDegree[]" type="text" class="sr-only" >
                                            <input value="{{ $educ->fromAtt }}" name="educPeriodFrom[]" type="text" class="sr-only" >
                                            <input value="{{ $educ->toAtt }}" name="educPeriodTo[]" type="text" class="sr-only" >
                                            <input value="{{ $educ->highLevel }}" name="educUnits[]" type="text" class="sr-only" >
                                            <input value="{{ $educ->yearGrad }}" name="educYearGraduated]" type="text" class="sr-only" >
                                            <input value="{{ $educ->scholarship }}" name="educAwards[]" type="text" class="sr-only" >

                                            <div>
                                                Level: {{ $educ->level }}<br>
                                                Name of School: {{ $educ->school_name }}<br>
                                                Basic Education/Degree/Course: {{ $educ->degree }} <br>
                                                PA From: {{ $educ->fromAtt }}<br>
                                                PA To: {{ $educ->toAtt }}<br>
                                                Highest Level/Units Earned: {{ $educ->highLevel }}<br>
                                                Year Graduated: {{ $educ->yearGrad }}<br>
                                                Scholarship/Academic Honors Received: {{ $educ->scholarship }}
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- End of Part 3 ] -->

                            <!-- [ Part 4: Civil Service Eligibility -->
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>IV. <span class="fw-bold text-warning">Civil Service Eligibility</span></span>
                                <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newCService">add</button>
                            </div>

                            <ul id="newCServiceContainer">
                                @foreach ($employee->employeeCS as $cs)
                                    <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $cs->career }}" name="csCareer[]" type="text" class="sr-only" >
                                            <input value="{{ $cs->rating }}" name="csRating[]" type="text" class="sr-only" >
                                            <input value="{{ $cs->conferment }}" name="csDateExamConf[]" type="text" class="sr-only" >
                                            <input value="{{ $cs->conferPlace }}" name="csPlaceExamConf[]" type="text" class="sr-only" >
                                            <input value="{{ $cs->licenseNo }}" name="csLicenseNo[]" type="text" class="sr-only" >
                                            <input value="{{ $cs->licenseDVal }}" name="csLicenseDate[]" type="text" class="sr-only" >

                                            <div>
                                                Career Service/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES/CSEE BARANGAY ELIGIBILITY/ DRIVER'S LICENSE: {{ $cs->career }}<br>
                                                Rating: {{ $cs->rating }}<br>
                                                Date of examination/conferment: {{ $cs->conferment }} <br>
                                                Place of Examination/Conferment: {{ $cs->conferPlace }}<br>
                                                License No.: {{ $cs->licenseNo }}<br>
                                                License Date of Validity: {{ $cs->licenseDVal }}
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- End of Part 4 ] -->

                            <!-- [ Part 5: Work Experience -->
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>V. <span class="fw-bold text-warning">Work Experience</span></span>
                                <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newWExp">add</button>
                            </div>

                            <ul id="newWExpContainer">
                                @foreach ($employee->employeeWE as $we)
                                    <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $we->incFrom == null || $we->incFrom == '' ? 'Present' : $we->incFrom }}" name="wexpIncFrom[]" type="text" class="sr-only" >
                                            <input value="{{ $we->incTo }}" name="wexpIncTo[]" type="text" class="sr-only" >
                                            <input value="{{ $we->position }}" name="wexpPosition[]" type="text" class="sr-only" >
                                            <input value="{{ $we->company }}" name="wexpDepartment[]" type="text" class="sr-only" >
                                            <input value="{{ $we->monthlySalary }}" name="wexpSalary[]" type="text" class="sr-only" >
                                            <input value="{{ $we->stepInc }}" name="wexpIncrement[]" type="text" class="sr-only" >
                                            <input value="{{ $we->appointmentStat }}" name="wexpStatus[]" type="text" class="sr-only" >
                                            <input value="{{ $we->govt }}" name="wexpIsGovt[]" type="text" class="sr-only" >

                                            <div>
                                                Inclusive Dates - From: {{ $we->incFrom == null || $we->incFrom == '' ? 'Present' : $we->incFrom }}<br>
                                                Inclusive Dates - To: {{ $we->incTo }}<br>
                                                Position Title: {{ $we->position }}<br>
                                                Department/Agency/Office/Company: {{ $we->company }} <br>
                                                Monthly Salary: {{ $we->monthlySalary }}<br>
                                                Salary/Job/Pay Grade & Step Increment: {{ $we->stepInc }}<br>
                                                Status of Appointment: {{ $we->appointmentStat }}
                                                Government Service: {{ $we->govt }}
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- End of Part 5 ] -->

                            <!-- [ Part 6: Work Experience -->
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>VI. <span class="fw-bold text-warning">Voluntary work or involvement in civic/non-government/people/voluntary organization/s</span></span>
                                <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newVoluntary">add</button>
                            </div>

                            <ul id="newVoluntaryContainer">
                                @foreach ($employee->employeeVol as $vol)
                                    <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $vol->organization }}" name="volOrganizationAddress[]" type="text" class="sr-only" >
                                            <input value="{{ $vol->incTo }}" name="volIncTo[]" type="text" class="sr-only" >
                                            <input value="{{ $vol->incFrom }}" name="volIncFrom[]" type="text" class="sr-only" >
                                            <input value="{{ $vol->noHours }}" name="volHours[]" type="text" class="sr-only" >
                                            <input value="{{ $vol->position }}" name="volPosition[]" type="text" class="sr-only" >

                                            <div>
                                                Name & Address of organization: {{ $vol->organization }}<br>
                                                Inclusive Dates - From: {{ $vol->incFrom }}<br>
                                                Inclusive Dates - To: {{ $vol->incTo }}<br>
                                                Number of Hours: {{ $vol->noHours }} <br>
                                                Position / Nature of Work: {{ $vol->position }}
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- End of Part 6 ] -->

                            <!-- [ Part 7: Learning & Development (L&D) Interventions/Training programs attended -->
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>VII. <span class="fw-bold text-warning">Learning & Development (L&D) Interventions/Training programs attended</span></span>
                                <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newLearning">add</button>
                            </div>

                            <ul id="newLearningContainer">
                                @foreach ($employee->employeeLearning as $learn)
                                    <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $learn->learningTitle }}" name="learningOrganizationAddress[]" type="text" class="sr-only" >
                                            <input value="{{ $learn->atTo }}" name="learningIncTo[]" type="text" class="sr-only" >
                                            <input value="{{ $learn->atFrom }}" name="learningIncFrom[]" type="text" class="sr-only" >
                                            <input value="{{ $learn->noHours }}" name="learningHours[]" type="text" class="sr-only" >
                                            <input value="{{ $learn->ld }}" name="learningLd[]" type="text" class="sr-only" >
                                            <input value="{{ $learn->conducted }}" name="learningSponsored[]" type="text" class="sr-only" >

                                            <div>
                                                Title of Learning & Development Interventions/Training Programs: {{ $learn->learningTitle }}<br>
                                                Inclusive Dates of Attendance - From: {{ $learn->atFrom }}<br>
                                                Inclusive Dates of Attendance - To: {{ $learn->atTo }}<br>
                                                Number of Hours: {{ $learn->noHours }} <br>
                                                Type of LD: {{ $learn->ld }}
                                                Conducted/Sponsored By: {{ $learn->conducted }}
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- End of Part 7 ] -->

                            <!-- [ Part 8: Other Information -->
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>VIII. <span class="fw-bold text-warning">Other Information</span></span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>Special skills & hobbies</span>
                                <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newOtherSkills">add</button>
                            </div>

                            <ul id="newOtherSkillsContainer">
                                @foreach ($employee->employeeHobby as $hobby)
                                    <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $hobby->hobby }}" name="skills[]" type="text" class="sr-only" >

                                            <div>
                                                {{ $hobby->hobby }}
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>Non-Academic Distinctions/Recognition</span>
                                <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newOtherAcademic">add</button>
                            </div>

                            <ul id="newOtherAcademicContainer">
                                @foreach ($employee->employeeRecog as $recog)
                                    <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $recog->recognition }}" name="academic[]" type="text" class="sr-only" >

                                            <div>
                                                {{ $recog->recognition }}
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>Membership in association/organization</span>
                                <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newOtherMembership">add</button>
                            </div>

                            <ul id="newOtherMembershipContainer">
                                @foreach ($employee->employeeMembership as $membership)
                                     <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $membership->membership }}" name="membership[]" type="text" class="sr-only" >

                                            <div>
                                                {{ $membership->membership }}
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- End of Part 8 ] -->

                            {{-- skip 34 - 40 --}}

                            <div class="d-flex align-items-center justify-content-between w-100">
                                <span>References</span>
                                <button type="button" class="btn btn-sm btn-primary mb-2" data-mdb-toggle="modal" data-mdb-target="#newReference">add</button>
                            </div>

                            <ul id="newReferenceContainer">
                                @foreach ($employee->employeeReference as $reference)
                                    <li>
                                        <div class="border-bottom w-100 py-2 d-flex align-items-center justify-content-between">
                                            <input value="{{ $reference->name }}" name="refName[]" type="text" class="sr-only" >
                                            <input value="{{ $reference->address }}" name="refAddress[]" type="text" class="sr-only" >
                                            <input value="{{ $reference->telephone }}" name="refTelephone[]" type="text" class="sr-only" >

                                            <div>
                                                Name: {{ $reference->name }}<br>
                                                Address: {{ $reference->address }}<br>
                                                Telephone No.: {{ $reference->telephone }}<br>
                                            </div>

                                            <span style="cursor: pointer" class="material-icons-outlined text-danger" onclick="this.parentElement.parentElement.remove()">remove</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeIssuedId->issuedId }}" id="gid" class="form-control form-control-lg" name="gid">
                                        <label class="form-label" for="gid" style="margin-left: 0px;">Government issued ID</label>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeIssuedId->licenseNo }}" id="gnumber" class="form-control form-control-lg" name="gnumber">
                                        <label class="form-label" for="gnumber" style="margin-left: 0px;">ID/License/Passport No.</label>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ $employee->employeeIssuedId->issuancePlace }}" id="gissuance" class="form-control form-control-lg" name="gissuance">
                                        <label class="form-label" for="gissuance" style="margin-left: 0px;">Date/Place of Issuance</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-warning btn-md mt-3">save changes</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
@stop

@section('extra_js')
    <script>
        function modifyAddress(fromId, targetId, name) {
            $(document).ready(function() {
                $.ajax({
                    type: 'POST',
                    url: '/welcome/hr/employee/new/getNextAddress',
                    data: {
                        _token: "{{ csrf_token() }}",
                        from: name,
                        value: $(fromId).val()
                    },
                    beforeSend: () => $(targetId).html('<option>Please wait..</option>'),
                    success: (response) => $(targetId).html(response),
                    error: (e) => console.log(e)
                });
            });
        }
    </script>
@stop
