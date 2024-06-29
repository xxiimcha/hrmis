@extends('includes.layout')

@section('content')
    @include('includes.employee-menu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <h2 class="h1 fw-bold">Dashboard</h2>
                <h1 class="h6 pb-4">Welcome to the employee dashboard</h1>

                <div class="row">
                    <div class="col-xl-4 mb-3">
                        <div class="card bg-warning text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">all_inbox</span>
                                Leave Requests
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $leaveCount }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-success text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2"></span>
                                Vacation Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $vacationLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-danger text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">healing</span>
                                Sick Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $sickLeave }}
                            </div>
                        </div>
                    </div>

                    <!-- Additional leave cards -->
                    <div class="col-xl-4 mb-3">
                        <div class="card bg-primary text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">event_note</span>
                                Mandatory Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $mandatoryLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-info text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">pregnant_woman</span>
                                Maternity Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $maternityLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-secondary text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">child_care</span>
                                Paternity Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $paternityLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-dark text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">star</span>
                                Special Privilege Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $specialPrivilegeLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-warning text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">person</span>
                                Solo Parent Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $soloParentLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-success text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">school</span>
                                Study Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $studyLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-danger text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">warning</span>
                                VAWC Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $vawcLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-primary text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">healing</span>
                                Rehabilitation Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $rehabilitationLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-info text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">female</span>
                                Special Leave For Women
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $specialLeaveForWomen }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-secondary text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">emergency</span>
                                Special Emergency Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $specialEmergencyLeave }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mb-3">
                        <div class="card bg-dark text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">child_friendly</span>
                                Adoption Leave
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $adoptionLeave }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@stop
