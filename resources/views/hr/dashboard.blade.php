@extends('includes.layout')

@section('content')
    @include('includes.hrmenu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <h2 class="h1 fw-bold">Dashboard</h2>
                <h1 class="h6 pb-4">Overview of Employee and Leave Requests</h1>

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

                    @php
                        $colors = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-dark'];
                    @endphp

                    @foreach($leaveTypes as $leaveType => $count)
                        @php
                            $randomColor = $colors[array_rand($colors)];
                        @endphp
                        <div class="col-xl-4">
                            <div class="card text-white mb-3 {{ $randomColor }}">
                                <div class="card-header d-flex align-items-center">
                                    <span class="material-icons-outlined me-2">list_alt</span>
                                    {{ $leaveType }}
                                </div>
                                <div class="card-body fw-bold py-2 h4">
                                    {{ $count }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@stop
