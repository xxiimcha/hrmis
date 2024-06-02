@extends('includes.layout')

@section('content')
    @include('includes.dh-menu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <h2 class="h1 fw-bold">Dashboard</h2>
                <h1 class="h6 pb-4">
                    Insights at a Glance: Your Data, Your Way.
                </h1>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card bg-warning text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">groups</span>
                                Employee
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $employee }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card bg-success text-white">
                            <div class="card-header d-flex align-items-center">
                                <span class="material-icons-outlined me-2">all_inbox</span>
                                Leave Requests
                            </div>
                            <div class="card-body fw-bold py-2 h4">
                                {{ $leaveRequest }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@stop
