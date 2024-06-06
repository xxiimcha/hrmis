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

    <main style="margin-top: 63px;">
        <div class="alert alert-warning rounded-0 mb-3 small">
            <strong>Note:</strong> This form must refer to the Personal Data Sheet CS Form No. 212 (Revised 2017)
        </div>

        <div class="container">
            <section class="px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Employee</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Employee</li>
                    </ol>
                </nav>

                @include('includes.message')

                <div class="card mb-5 shadow-none">
                    <div class="card-body p-0">
                        <form onsubmit="return validateForm()" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-xl-6 mb-2">
                                    <div class="form-outline mb-2">
                                        <input type="text" id="position" class="form-control form-control-lg" required name="position">
                                        <label class="form-label" for="position" style="margin-left: 0px;">Position <small class="text-muted">(required)</small></label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <select name="department" class="select form-control" data-mdb-filter="true">
                                        <option disabled selected>Choose Department</option>
                                        @foreach ($departments as $dep)
                                            <option value="{{ $dep->id }}">{{ ucwords($dep->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <p class="small">** For service record **</p>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-outline mb-2">
                                        <input type="date" id="fromDate" class="form-control form-control-lg active" name="fromDate" required>
                                        <label class="form-label active" for="fromDate" style="margin-left: 0px;">Inclusive Dates - From <small class="text-muted">(required)</small></label>
                                    </div>

                                    <div class="form-outline mb-2">
                                        <input type="date" id="toDate" class="form-control form-control-lg active" name="toDate">
                                        <label class="form-label active" for="toDate" style="margin-left: 0px;">Inclusive Dates - To</label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <select name="status" class="form-control select">
                                        <option disabled selected>Status</option>
                                        <option value="Job Order">Job Order</option>
                                        <option value="Casual">Casual</option>
                                        <option value="Regular">Regular</option>
                                    </select>

                                    <div class="row mt-2">
                                        <div class="col-xl-6">
                                            <div class="form-outline mb-2">
                                                <input type="number" id="salary" name="salary" class="form-control form-control-lg" required>
                                                <label class="form-label" for="salary" style="margin-left: 0px;">₱ Salary</label>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 mb-2">
                                            <select name="salaryMode" class="form-control select">
                                                <option disabled selected>Mode</option>
                                                <option value="day">Day</option>
                                                <option value="mo">Month</option>
                                                <option value="week">Week</option>
                                                <option value="ann">Annual</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-outline mb-2">
                                        <input type="text" id="branch" name="branch" class="form-control form-control-lg" required>
                                        <label class="form-label" for="branch" style="margin-left: 0px;">Branch National Municipal</label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-outline mb-3">
                                        <input type="text" id="remarks" name="remarks" class="form-control form-control-lg" required>
                                        <label class="form-label" for="remarks" style="margin-left: 0px;">Remarks</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Part 1: Personal Information -->
                            <div id="part1" class="form-part">
                                <p class="mt-2 alert alert-dark bluish_button">I. <span class="fw-bold">Personal Information</span></p>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="pe_firstname" class="form-control form-control-lg no_special_char" required name="firstname">
                                            <label class="form-label" for="pe_firstname" style="margin-left: 0px;">First name <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="pe_middlename" class="form-control form-control-lg no_special_char" required name="middlename">
                                            <label class="form-label" for="pe_middlename" style="margin-left: 0px;">Middle name </label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pe_lastname" class="form-control form-control-lg no_special_char" required name="lastname">
                                            <label class="form-label" for="pe_lastname" style="margin-left: 0px;">Surname <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <select name="pe_extension" class="select form-control">
                                            <option disabled selected>Extension</option>
                                            <option value="N/A">N/A.</option>
                                            <option value="JR">JR.</option>
                                            <option value="SR">SR.</option>
                                            <option value="THIRD">THIRD.</option>
                                            <option value="FOURTH">FOURTH.</option>
                                            <option value="FIFTH">FIFTH.</option>
                                            <option value="SIXTH">SIXTH.</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="date" id="pe_birthday" class="form-control form-control-lg active" required name="pe_birthday" onchange="validateAge()">
                                            <label class="form-label active" for="pe_birthday" style="margin-left: 0px;">Date of Birth <small class="text-muted">(required)</small></label>
                                            <small id="ageValidationError" class="text-danger" style="display: none;">Age must be 18 or older.</small>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pe_placeofbirth" class="form-control form-control-lg" required name="pe_placeofbirth">
                                            <label class="form-label" for="pe_placeofbirth" style="margin-left: 0px;">Place of Birth <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <select name="pe_sex" class="select form-control">
                                            <option disabled selected>Sex</option>
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <select name="pe_civilstatus" class="select form-control">
                                            <option disabled selected>Civil Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="number" id="pe_height" class="form-control form-control-lg" required name="pe_height">
                                            <label class="form-label" for="pe_height" style="margin-left: 0px;">Height <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="number" id="pe_weight" class="form-control form-control-lg" required name="pe_weight">
                                            <label class="form-label" for="pe_weight" style="margin-left: 0px;">Weight <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <select name="pe_bloodtype" class="select form-control">
                                            <option disabled selected>Blood Type</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pe_gsis" class="form-control form-control-lg" required name="pe_gsis">
                                            <label class="form-label" for="pe_gsis" style="margin-left: 0px;">GSIS ID No. <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pe_pagibig" class="form-control form-control-lg" required name="pe_pagibig" data-format="####-####-####">
                                            <label class="form-label" for="pe_pagibig" style="margin-left: 0px;">PAG-IBIG ID No. <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pe_philhealth" class="form-control form-control-lg" required name="pe_philhealth" data-format="##-#########-#">
                                            <label class="form-label" for="pe_philhealth" style="margin-left: 0px;">PHILHEALTH No. <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pe_sss" class="form-control form-control-lg" required name="pe_sss" data-format="##-#######-#">
                                            <label class="form-label" for="pe_sss" style="margin-left: 0px;">SSS No. <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pe_tin" class="form-control form-control-lg" required name="pe_tin" data-format="###-###-###-###">
                                            <label class="form-label" for="pe_tin" style="margin-left: 0px;">TIN No. <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pe_employee_number" class="form-control form-control-lg" required name="employee_number">
                                            <label class="form-label" for="pe_employee_number" style="margin-left: 0px;">AGENCY EMPLOYEE No. <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pe_citizenship" class="form-control form-control-lg" required name="pe_citizenship">
                                            <label class="form-label" for="pe_citizenship" style="margin-left: 0px;">Citizenship <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <p class="small pt-2">** Residential Address **</p>

                                    <div class="col-xl-4 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="res_block" class="form-control form-control-lg" name="res_block">
                                            <label class="form-label" for="res_block" style="margin-left: 0px;">House/Block/Lot No.</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="res_street" class="form-control form-control-lg" name="res_street">
                                            <label class="form-label" for="res_street" style="margin-left: 0px;">Street</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="res_village" class="form-control form-control-lg" name="res_village">
                                            <label class="form-label" for="res_village" style="margin-left: 0px;">Subdivision/Village</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <select name="raprov" id="raprov" class="select form-control" data-mdb-filter="true" onchange="modifyAddress('#raprov', '#racm', 'province')">
                                            <option disabled selected>Province</option>
                                            @foreach ($provinces as $prov)
                                                <option value="{{ $prov->province_code }}">{{ $prov->province_description }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <select name="racm" id="racm" class="select form-control" data-mdb-filter="true" onchange="modifyAddress('#racm', '#rab', 'city')">
                                            <option disabled selected>City / Municipality</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <select name="rab" id="rab" class="select form-control" data-mdb-filter="true">
                                            <option disabled selected>Baranggay</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="number" id="res_zipcode" class="form-control form-control-lg" required name="res_zipcode">
                                            <label class="form-label" for="res_zipcode" style="margin-left: 0px;">Zip Code <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <p class="small pt-2">** Permanent Address **</p>

                                    <div class="col-xl-4 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="perm_house" class="form-control form-control-lg" name="perm_house">
                                            <label class="form-label" for="perm_house" style="margin-left: 0px;">House/Block/Lot No.</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="perm_street" class="form-control form-control-lg" name="perm_street">
                                            <label class="form-label" for="perm_street" style="margin-left: 0px;">Street</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="perm_village" class="form-control form-control-lg" name="perm_village">
                                            <label class="form-label" for="perm_village" style="margin-left: 0px;">Subdivision/Village</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <select name="paprov" id="paprov" class="select form-control" data-mdb-filter="true" onchange="modifyAddress('#paprov', '#pacm', 'province')">
                                            <option disabled selected>Province</option>
                                            @foreach ($provinces as $prov)
                                                <option value="{{ $prov->province_code }}">{{ $prov->province_description }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <select name="pacm" id="pacm" class="select form-control" data-mdb-filter="true" onchange="modifyAddress('#pacm', '#pab', 'city')">
                                            <option disabled selected>City / Municipality</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-4 mb-2">
                                        <select name="pab" id="pab" class="select form-control" data-mdb-filter="true">
                                            <option disabled selected>Baranggay</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <div class="form-outline">
                                            <input type="number" id="perm_zipcode" class="form-control form-control-lg" required name="perm_zipcode">
                                            <label class="form-label" for="perm_zipcode" style="margin-left: 0px;">Zip Code <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-7 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pa_telephone" class="form-control form-control-lg" name="pa_telephone">
                                            <label class="form-label" for="pa_telephone" style="margin-left: 0px;">Telephone No.</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-7 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="pa_mobile" class="form-control form-control-lg" name="pa_mobile">
                                            <label class="form-label" for="pa_mobile" style="margin-left: 0px;">Mobile No.</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-7 mb-4">
                                        <div class="form-outline">
                                            <input type="email" id="pa_email" class="form-control form-control-lg" name="email">
                                            <label class="form-label" for="pa_email" style="margin-left: 0px;">Email <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>
                                </div>
                                <button onclick="showNextPart('part1', 'part2')" class="btn btn-warning btn-md">Next</button>
                            </div>
                            <!-- End of Part 1 -->

                            <!-- Part 2: Family Background -->
                            <div id="part2" class="form-part" style="display: none;">
                                <p class="alert alert-dark bluish_button">II. <span class="fw-bold">Family Background</span></p>

                                <div class="row">
                                    <p class="small">Spouse's Information</p>

                                    <div class="col-xl-6">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="spouse_firstname" class="form-control form-control-lg no_special_char" name="spouseFirstname">
                                            <label class="form-label" for="spouse_firstname" style="margin-left: 0px;">First name</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="spouse_middlename" class="form-control form-control-lg no_special_char" name="spouseMiddlename">
                                            <label class="form-label" for="spouse_middlename" style="margin-left: 0px;">Middle name</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="spouse_lastname" class="form-control form-control-lg no_special_char" name="spouseLastname">
                                            <label class="form-label" for="spouse_lastname" style="margin-left: 0px;">Surname</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <select name="spouseExtension" class="select form-control">
                                            <option disabled selected>Extension</option>
                                            <option value="JR">JR.</option>
                                            <option value="SR">SR.</option>
                                            <option value="THIRD">THIRD.</option>
                                            <option value="FOURTH">FOURTH.</option>
                                            <option value="FIFTH">FIFTH.</option>
                                            <option value="SIXTH">SIXTH.</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="spouse_occupation" class="form-control form-control-lg" name="spouseOccupation">
                                            <label class="form-label" for="spouse_occupation" style="margin-left: 0px;">Occupation</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="spouse_employer" class="form-control form-control-lg" name="spouseEmployer">
                                            <label class="form-label" for="spouse_employer" style="margin-left: 0px;">Employer/Business Name</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="spouse_businessadd" class="form-control form-control-lg" name="spouseBusinessAddress">
                                            <label class="form-label" for="spouse_businessadd" style="margin-left: 0px;">Business Address</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="spouse_telephone" class="form-control form-control-lg" name="spouseTelephone">
                                            <label class="form-label" for="spouse_telephone" style="margin-left: 0px;">Telephone No.</label>
                                        </div>
                                    </div>

                                    <p class="small pt-2">Father's Information</p>

                                    <div class="col-xl-6">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="father_firstname" class="form-control form-control-lg no_special_char" required name="fatherFirstname">
                                            <label class="form-label" for="father_firstname" style="margin-left: 0px;">First name <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="father_middlename" class="form-control form-control-lg no_special_char" required name="fatherMiddlename">
                                            <label class="form-label" for="father_middlename" style="margin-left: 0px;">Middle name </label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="father_lastname" class="form-control form-control-lg no_special_char" required name="fatherLastname">
                                            <label class="form-label" for="father_lastname" style="margin-left: 0px;">Surname <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <select name="fatherExtension" class="select form-control">
                                            <option disabled selected>Extension</option>
                                            <option value="JR">JR.</option>
                                            <option value="SR">SR.</option>
                                            <option value="THIRD">THIRD.</option>
                                            <option value="FOURTH">FOURTH.</option>
                                            <option value="FIFTH">FIFTH.</option>
                                            <option value="SIXTH">SIXTH.</option>
                                        </select>
                                    </div>

                                    <p class="small pt-2">Mother's Information</p>

                                    <div class="col-xl-6">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="mother_maiden" class="form-control form-control-lg no_special_char" required name="motherMaiden">
                                            <label class="form-label" for="mother_maiden" style="margin-left: 0px;">Maiden name <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="mother_firstname" class="form-control form-control-lg no_special_char" required name="motherFirstname">
                                            <label class="form-label" for="mother_firstname" style="margin-left: 0px;">First name <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="mother_middlename" class="form-control form-control-lg no_special_char" required name="motherMiddlename">
                                            <label class="form-label" for="mother_middlename" style="margin-left: 0px;">Middle name </label>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 mb-2">
                                        <div class="form-outline">
                                            <input type="text" id="mother_lastname" class="form-control form-control-lg no_special_char" required name="motherLastname">
                                            <label class="form-label" for="mother_lastname" style="margin-left: 0px;">Surname <small class="text-muted">(required)</small></label>
                                        </div>
                                    </div>

                                    <p class="small pt-2 d-flex align-items-center justify-content-between">
                                        Name of children (Write full name & list all) <button type="button" data-mdb-toggle="modal" data-mdb-target="#newChild" class="btn btn-sm btn-primary">add</button>
                                    </p>
                                </div>

                                <ul id="newChildContainer"></ul>
                                <button onclick="showPreviousPart('part2', 'part1')" class="btn btn-success btn-md">Previous</button>
                                <button onclick="showNextPart('part2', 'part3')" class="btn btn-warning btn-md">Next</button>
                            </div>
                            <!-- End of Part 2 -->

                            <!-- Part 3: Educational Background -->
                            <div id="part3" class="form-part" style="display: none;">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>III. <span class="fw-bold text-warning">Educational Background</span></span>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newEduc">add</button>
                                </div>

                                <ul id="newEducContainer"></ul>
                                <button onclick="showPreviousPart('part3', 'part2')" class="btn btn-success btn-md">Previous</button>
                                <button onclick="showNextPart('part3', 'part4')" class="btn btn-warning btn-md">Next</button>
                            </div>
                            <!-- End of Part 3 -->

                            <!-- Part 4: Civil Service Eligibility -->
                            <div id="part4" class="form-part" style="display: none;">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>IV. <span class="fw-bold text-warning">Civil Service Eligibility</span></span>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newCService">add</button>
                                </div>

                                <ul id="newCServiceContainer"></ul>
                                <button onclick="showPreviousPart('part4', 'part3')" class="btn btn-success btn-md">Previous</button>
                                <button onclick="showNextPart('part4', 'part5')" class="btn btn-warning btn-md">Next</button>
                            </div>
                            <!-- End of Part 4 -->

                            <!-- Part 5: Work Experience -->
                            <div id="part5" class="form-part" style="display: none;">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>V. <span class="fw-bold text-warning">Work Experience</span></span>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newWExp">add</button>
                                </div>

                                <ul id="newWExpContainer"></ul>
                                <button onclick="showPreviousPart('part5', 'part4')" class="btn btn-success btn-md">Previous</button>
                                <button onclick="showNextPart('part5', 'part6')" class="btn btn-warning btn-md">Next</button>
                            </div>
                            <!-- End of Part 5 -->

                            <!-- Part 6: Voluntary Work -->
                            <div id="part6" class="form-part" style="display: none;">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>VI. <span class="fw-bold text-warning">Voluntary work or involvement in civic/non-government/people/voluntary organization/s</span></span>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newVoluntary">add</button>
                                </div>

                                <ul id="newVoluntaryContainer"></ul>
                                <button onclick="showPreviousPart('part6', 'part5')" class="btn btn-success btn-md">Previous</button>
                                <button onclick="showNextPart('part6', 'part7')" class="btn btn-warning btn-md">Next</button>
                            </div>
                            <!-- End of Part 6 -->

                            <!-- Part 7: Learning & Development -->
                            <div id="part7" class="form-part" style="display: none;">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>VII. <span class="fw-bold text-warning">Learning & Development (L&D) Interventions/Training programs attended</span></span>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newLearning">add</button>
                                </div>
                                <ul id="newLearningContainer"></ul>
                                <button onclick="showPreviousPart('part7', 'part6')" class="btn btn-success btn-md">Previous</button>
                                <button onclick="showNextPart('part7', 'part8')" class="btn btn-warning btn-md">Next</button>
                            </div>
                            <!-- End of Part 7 -->

                            <!-- Part 8: Other Information -->
                            <div id="part8" class="form-part" style="display: none;">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>VIII. <span class="fw-bold text-warning">Other Information</span></span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>Special skills & hobbies</span>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newOtherSkills">add</button>
                                </div>

                                <ul id="newOtherSkillsContainer"></ul>

                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>Non-Academic Distinctions/Recognition</span>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newOtherAcademic">add</button>
                                </div>

                                <ul id="newOtherAcademicContainer"></ul>

                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>Membership in association/organization</span>
                                    <button type="button" class="btn btn-sm btn-primary mt-2" data-mdb-toggle="modal" data-mdb-target="#newOtherMembership">add</button>
                                </div>

                                <ul id="newOtherMembershipContainer"></ul>

                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span>References</span>
                                    <button type="button" class="btn btn-sm btn-primary mb-2" data-mdb-toggle="modal" data-mdb-target="#newReference">add</button>
                                </div>

                                <ul id="newReferenceContainer"></ul>

                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="gid" class="form-control form-control-lg" name="gid">
                                            <label class="form-label" for="gid" style="margin-left: 0px;">Government issued ID</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="gnumber" class="form-control form-control-lg" name="gnumber">
                                            <label class="form-label" for="gnumber" style="margin-left: 0px;">ID/License/Passport No.</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-outline mb-2">
                                            <input type="text" id="gissuance" class="form-control form-control-lg" name="gissuance">
                                            <label class="form-label" for="gissuance" style="margin-left: 0px;">Date/Place of Issuance</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-warning btn-md mt-3">save employee data</button>
                                <br><br>
                                <button onclick="showPreviousPart('part8', 'part7')" class="btn btn-success btn-md">Previous</button>
                            </div>
                            <!-- End of Part 8 -->
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
@stop

@section('extra_js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const gsisInput = document.getElementById('pe_gsis');

        function formatGSISInput(value) {
            const rawValue = value.replace(/[^0-9]/g, ''); // Remove all non-digit characters
            const part1 = rawValue.substring(0, 4);
            const part2 = rawValue.substring(4, 11);
            const part3 = rawValue.substring(11, 12);
            let formattedValue = 'CRN- ';

            if (part1) formattedValue += part1;
            if (part2) formattedValue += '-' + part2;
            if (part3) formattedValue += '-' + part3;

            return formattedValue;
        }

        gsisInput.addEventListener('input', function() {
            const value = gsisInput.value;
            gsisInput.value = formatGSISInput(value);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        function formatInput(value, format) {
            let formatted = '';
            let index = 0;
            for (let i = 0; i < format.length; i++) {
                if (index >= value.length) {
                    break;
                }
                if (format[i] === '#') {
                    formatted += value[index];
                    index++;
                } else {
                    formatted += format[i];
                }
            }
            return formatted;
        }

        function handleKeypress(event) {
            const input = event.target;
            const format = input.getAttribute('data-format');
            const value = input.value.replace(/\D/g, ''); // Remove all non-digit characters
            input.value = formatInput(value, format);
        }

        const inputs = document.querySelectorAll('input[data-format]');
        inputs.forEach(input => {
            input.addEventListener('input', handleKeypress);
        });
    });

    function showNextPart(currentPartId, nextPartId) {
        $('#' + currentPartId).hide();
        $('#' + nextPartId).show();
    }

    function showPreviousPart(currentPartId, previousPartId) {
        $('#' + currentPartId).hide();
        $('#' + previousPartId).show();
    }

    function validateAge() {
        const birthdayInput = document.getElementById('pe_birthday');
        const birthday = new Date(birthdayInput.value);
        const age = calculateAge(birthday);
        const ageValidationError = document.getElementById('ageValidationError');

        if (age < 18) {
            ageValidationError.style.display = 'block';
            return false;
        } else {
            ageValidationError.style.display = 'none';
            return true;
        }
    }

    function calculateAge(birthday) {
        const today = new Date();
        let age = today.getFullYear() - birthday.getFullYear();
        const monthDifference = today.getMonth() - birthday.getMonth();

        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthday.getDate())) {
            age--;
        }
        return age;
    }

    function validateForm() {
        return validateAge();
    }

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
