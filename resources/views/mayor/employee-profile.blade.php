@extends('includes.layout')

@section('content')
    @include('includes.mayor-menu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Employee</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucwords($employee->employeeInfo->firstname . ' ' . $employee->employeeInfo->middlename . ' ' . $employee->employeeInfo->lastname) }}</li>
                    </ol>
                </nav>

                @include('includes.message')

                <div class="card mb-3 shadow-none">
                    <div class="card-body p-0">
                        <div class="row small">
                            <div class="col-xl-2">
                                <strong>Position :</strong>
                            </div>

                            <div class="col-xl-10">
                                {{ ucwords($employee->position) }}
                            </div>
                        </div>

                        <div class="row small">
                            <div class="col-xl-2">
                                <strong>Current Salary :</strong>
                            </div>

                            <div class="col-xl-10">
                                ₱{{ ucwords($employee->current_salary) }} {{ $employee->current_salary_mode }}
                            </div>
                        </div>

                        <div class="row small mb-4">
                            <div class="col-xl-2">
                                <strong>Leave Credits :</strong>
                            </div>

                            <div class="col-xl-10 d-flex align-items-center">
                                <span id="creditsCount">{{ $employee->leaveCredits }}</span>
                            </div>
                        </div>

                        <div class="accordion" id="details">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#personal-info-accordion" aria-expanded="true" aria-controls="personal-info-accordion">
                                        Personal Information
                                    </button>
                                </h2>

                                <div id="personal-info-accordion" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>First name :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->firstname) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Middle name :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->middlename) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Surname :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->lastname) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Extension :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->extension == '' ? 'N/A' : $employee->employeeInfo->extension) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Birth Date :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->birthday) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Birth Place :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->birthPlace) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Sex :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->sex) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Civil Status :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->civilStatus) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Height :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->height) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Weight :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->weight) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Blood Type :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->bloodType) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>GSIS ID No :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->gsis) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>PAG-IBIG ID No :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->pagibig) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>PHILHEALTH No :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->philhealth) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>SSS No :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->sss) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>TIN No :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->tin) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Agency Employee No :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employee_number) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Citizenship :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->citizenship) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Telephone No :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->telephone ?? 'N/A') }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Mobile No :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->mobile ?? 'N/A') }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Email :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ $employee->employeeInfo->email }}
                                            </div>
                                        </div>
                                        <hr>

                                        <p class="small">** Residential Address **</p>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>House/Block/Lot No. :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeeResAdd->block == '' ? 'N/A' : $employee->employeeInfo->employeeResAdd->block) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Street :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeeResAdd->street == '' ? 'N/A' : $employee->employeeInfo->employeeResAdd->street) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Subdivision/Village :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeeResAdd->village == '' ? 'N/A' : $employee->employeeInfo->employeeResAdd->village) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Barangay :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeeResAdd->brgy->barangay_description == '' ? 'N/A' : $employee->employeeInfo->employeeResAdd->brgy->barangay_description) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>City/Municipality :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeeResAdd->cityCon->city_municipality_description == '' ? 'N/A' : $employee->employeeInfo->employeeResAdd->cityCon->city_municipality_description) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Province :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeeResAdd->provinceCon->province_description == '' ? 'N/A' : $employee->employeeInfo->employeeResAdd->provinceCon->province_description) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Zip Code :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeeResAdd->zipcode == '' ? 'N/A' : $employee->employeeInfo->employeeResAdd->zipcode) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <p class="small">** Permanent Address **</p>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>House/Block/Lot No. :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeePerAdd->block == '' ? 'N/A' : $employee->employeeInfo->employeePerAdd->block) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Street :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeePerAdd->street == '' ? 'N/A' : $employee->employeeInfo->employeePerAdd->street) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Subdivision/Village :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeePerAdd->village == '' ? 'N/A' : $employee->employeeInfo->employeePerAdd->village) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Barangay :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeePerAdd->brgy->barangay_description == '' ? 'N/A' : $employee->employeeInfo->employeePerAdd->brgy->barangay_description) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>City/Municipality :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeePerAdd->cityCon->city_municipality_description == '' ? 'N/A' : $employee->employeeInfo->employeePerAdd->cityCon->city_municipality_description) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Province :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeePerAdd->provinceCon->province_description == '' ? 'N/A' : $employee->employeeInfo->employeePerAdd->provinceCon->province_description) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Zip Code :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeInfo->employeePerAdd->zipcode == '' ? 'N/A' : $employee->employeeInfo->employeePerAdd->zipcode) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#family-background-accordion" aria-expanded="true" aria-controls="family-background-accordion">
                                        Family Background
                                    </button>
                                </h2>

                                <div id="family-background-accordion" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <p class="small">** Spouse Information **</p>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>First name :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeSpouseInfo->firstname) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Middle name :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeSpouseInfo->middlename) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Surname :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeSpouseInfo->lastname) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Extension :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeSpouseInfo->extension) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Occupation :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeSpouseInfo->occupation) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-3">
                                                <strong>Employer/Business Name :</strong>
                                            </div>

                                            <div class="col-xl-9">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeSpouseInfo->employer) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Business Address :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeSpouseInfo->busAdd) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small mb-4">
                                            <div class="col-xl-2">
                                                <strong>Telephone No :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeSpouseInfo->telephone) }}
                                            </div>
                                        </div>

                                        <p class="small">** Father Information **</p>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>First name :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeFatherInfo->firstname) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Middle name :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeFatherInfo->middlename) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Surname :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeFatherInfo->lastname) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small mb-4">
                                            <div class="col-xl-2">
                                                <strong>Extension :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeFatherInfo->extension) }}
                                            </div>
                                        </div>

                                        <p class="small">** Mother Information **</p>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>First name :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeMotherInfo->firstname) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Middle name :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeMotherInfo->middlename) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small mb-4">
                                            <div class="col-xl-2">
                                                <strong>Surname :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeFamilyBackground->employeeMotherInfo->lastname) }}
                                            </div>
                                        </div>

                                        <p class="small">** Childrens **</p>

                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="fw-bold">Name</th>
                                                    <th class="fw-bold">Date of Birth</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($employee->employeeFamilyBackground->employeeChildren as $children)
                                                    <tr>
                                                        <td>{{ $children->name }}</td>
                                                        <td>{{ $children->birthday }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#educational-background-accordion" aria-expanded="true" aria-controls="educational-background-accordion">
                                        Educational Background
                                    </button>
                                </h2>

                                <div id="educational-background-accordion" class="accordion-collapse collapse " aria-labelledby="headingThree" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold" rowspan="2">Level</th>
                                                        <th class="fw-bold" rowspan="2">Name of School</th>
                                                        <th class="fw-bold" rowspan="2">Basic Education/Degree/Course</th>
                                                        <th class="fw-bold" colspan="2">Period of Attendance</th>
                                                        <th class="fw-bold" rowspan="2">Highest level/Units earned</th>
                                                        <th class="fw-bold" rowspan="2">Year Graduated</th>
                                                        <th class="fw-bold" rowspan="2">Scholarship/Academic honors received</th>
                                                    </tr>

                                                    <tr>
                                                        <th>From</th>
                                                        <th>To</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($employee->employeeEducation as $educ)
                                                        <tr>
                                                            <td>{{ $educ->level }}</td>
                                                            <td>{{ $educ->school_name }}</td>
                                                            <td>{{ $educ->degree }}</td>
                                                            <td>{{ $educ->fromAtt }}</td>
                                                            <td>{{ $educ->toAtt }}</td>
                                                            <td>{{ $educ->highLevel }}</td>
                                                            <td>{{ $educ->yearGrad }}</td>
                                                            <td>{{ $educ->scholarship }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#civil-service-background-accordion" aria-expanded="true" aria-controls="civil-service-background-accordion">
                                        Civil Service Eligibility
                                    </button>
                                </h2>

                                <div id="civil-service-background-accordion" class="accordion-collapse collapse " aria-labelledby="headingFour" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold" rowspan="2">Career Service/RA 1080 (BOARD/BAR) ...</th>
                                                        <th class="fw-bold" rowspan="2">Rating</th>
                                                        <th class="fw-bold" rowspan="2">Date of Examination/Conferment</th>
                                                        <th class="fw-bold" rowspan="2">Place of Examination</th>
                                                        <th class="fw-bold" colspan="2">License</th>
                                                    </tr>

                                                    <tr>
                                                        <th>Number</th>
                                                        <th>Date of Validity</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($employee->employeeCS as $cs)
                                                        <tr>
                                                            <td>{{ $cs->career }}</td>
                                                            <td>{{ $cs->rating }}</td>
                                                            <td>{{ $cs->conferment }}</td>
                                                            <td>{{ $cs->conferPlace }}</td>
                                                            <td>{{ $cs->licenseNo }}</td>
                                                            <td>{{ $cs->licenseDVal }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#work-experience-background-accordion" aria-expanded="true" aria-controls="work-experience-background-accordion">
                                        Work Experience
                                    </button>
                                </h2>

                                <div id="work-experience-background-accordion" class="accordion-collapse collapse " aria-labelledby="headingFive" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold" colspan="2">Inclusive Dates</th>
                                                        <th class="fw-bold" rowspan="2">Position Title</th>
                                                        <th class="fw-bold" rowspan="2">Department/Agency/Office/Company</th>
                                                        <th class="fw-bold" rowspan="2">Monthly Salary</th>
                                                        <th class="fw-bold" rowspan="2">Salary/Job/Pay Grade & Step Increment</th>
                                                        <th class="fw-bold" rowspan="2">Status of Appointment</th>
                                                        <th class="fw-bold" rowspan="2">Gov't Service</th>
                                                    </tr>

                                                    <tr>
                                                        <th>From</th>
                                                        <th>To</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($employee->employeeWE as $we)
                                                        <tr>
                                                            <td>{{ $we->incFrom == null || $we->incFrom == '' ? 'Present' : $we->incFrom }}</td>
                                                            <td>{{ $we->incTo }}</td>
                                                            <td>{{ $we->position }}</td>
                                                            <td>{{ $we->company }}</td>
                                                            <td>{{ $we->monthlySalary }}</td>
                                                            <td>{{ $we->stepInc }}</td>
                                                            <td>{{ $we->appointmentStat }}</td>
                                                            <td>{{ $we->govt }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#voluntary-background-accordion" aria-expanded="true" aria-controls="voluntary-background-accordion">
                                        Voluntary work or involvement in civic/non-government/people/voluntary organization/s
                                    </button>
                                </h2>

                                <div id="voluntary-background-accordion" class="accordion-collapse collapse " aria-labelledby="headingSix" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold" rowspan="2">Name & Address or Organization</th>
                                                        <th class="fw-bold" colspan="2">Inclusive Dates</th>
                                                        <th class="fw-bold" rowspan="2">Number of Hours</th>
                                                        <th class="fw-bold" rowspan="2">Position/Nature of Work</th>
                                                    </tr>

                                                    <tr>
                                                        <th>From</th>
                                                        <th>To</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($employee->employeeVol as $vol)
                                                        <tr>
                                                            <td>{{ $vol->organization }}</td>
                                                            <td>{{ $vol->incFrom }}</td>
                                                            <td>{{ $vol->incTo }}</td>
                                                            <td>{{ $vol->noHours }}</td>
                                                            <td>{{ $vol->position }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#learning-background-accordion" aria-expanded="true" aria-controls="learning-background-accordion">
                                        Learning & Development (L&D) Interventions/Training Programs attended
                                    </button>
                                </h2>

                                <div id="learning-background-accordion" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold" rowspan="2">Title of Learning& Development Interventions ...</th>
                                                        <th class="fw-bold" colspan="2">Inclusive Dates of attendance</th>
                                                        <th class="fw-bold" rowspan="2">Number of Hours</th>
                                                        <th class="fw-bold" rowspan="2">Type of LD</th>
                                                        <th class="fw-bold" rowspan="2">Conducted/Sponsored By</th>
                                                    </tr>

                                                    <tr>
                                                        <th>From</th>
                                                        <th>To</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($employee->employeeLearning as $learn)
                                                        <tr>
                                                            <td>{{ $learn->learningTitle }}</td>
                                                            <td>{{ $learn->atFrom }}</td>
                                                            <td>{{ $learn->atTo }}</td>
                                                            <td>{{ $learn->noHours }}</td>
                                                            <td>{{ $learn->ld }}</td>
                                                            <td>{{ $learn->conducted }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEight">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#other-background-accordion" aria-expanded="true" aria-controls="other-background-accordion">
                                        Other Information
                                    </button>
                                </h2>

                                <div id="other-background-accordion" class="accordion-collapse collapse" aria-labelledby="headingEight" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold">Special skills & hobbies</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($employee->employeeHobby as $hobby)
                                                        <tr>
                                                            <td>{{ $hobby->hobby }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="table-responsive mb-2">
                                            <table class="table table-sm table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold">Non-academic distinctions/recognition</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($employee->employeeRecog as $recog)
                                                        <tr>
                                                            <td>{{ $recog->recognition }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold">Membership in association/organization</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($employee->employeeMembership as $membership)
                                                        <tr>
                                                            <td>{{ $membership->membership }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingNine">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#references-background-accordion" aria-expanded="true" aria-controls="references-background-accordion">
                                        References
                                    </button>
                                </h2>

                                <div id="references-background-accordion" class="accordion-collapse collapse" aria-labelledby="headingNine" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="fw-bold">Name</th>
                                                        <th class="fw-bold">Address</th>
                                                        <th class="fw-bold">Tel. No.</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($employee->employeeReference as $reference)
                                                        <tr>
                                                            <td>{{ $reference->name }}</td>
                                                            <td>{{ $reference->address }}</td>
                                                            <td>{{ $reference->telephone }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTen">
                                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#issued-background-accordion" aria-expanded="true" aria-controls="issued-background-accordion">
                                        Government Issued Id
                                    </button>
                                </h2>

                                <div id="issued-background-accordion" class="accordion-collapse collapse" aria-labelledby="headingTen" data-mdb-parent="#details">
                                    <div class="accordion-body">
                                        <div class="row small">
                                            <div class="col-xl-2">
                                                <strong>Government Issued ID :</strong>
                                            </div>

                                            <div class="col-xl-10">
                                                {{ ucwords($employee->employeeIssuedId->issuedId) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-3">
                                                <strong>ID/License/Passport No. :</strong>
                                            </div>

                                            <div class="col-xl-9">
                                                {{ ucwords($employee->employeeIssuedId->licenseNo) }}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row small">
                                            <div class="col-xl-3">
                                                <strong>Date/Place of Issuance :</strong>
                                            </div>

                                            <div class="col-xl-9">
                                                {{ ucwords($employee->employeeIssuedId->issuancePlace) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@stop
