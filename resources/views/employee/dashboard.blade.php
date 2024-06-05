@extends('includes.layout')

@section('content')
    @include('includes.employee-menu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <h2 class="h1 fw-bold">Dashboard</h2>
                <h1 class="h6 pb-4">Welcome to the employee dashboard</h1>

                <div class="row">
                    <div class="col-xl-4">
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

                    <div class="col-xl-4">
                        <div class="card bg-info text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">all_inbox</span>
                                Remaining Leaves
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $leaveCredits }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@stop
