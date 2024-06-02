@extends('includes.layout')

@section('content')
    @include('includes.dh-menu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Leave Requests</li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/welcome/dh/leave/managed">Managed</a></li>
                    </ol>
                </nav>

                <div class="card mb-3 shadow-none">
                    <div class="card-body p-0">
                        <div class="card mb-3 shadow-none">
                            <div class="card-body p-0">
                                <form method="GET">
                                    <div class="row mb-4 mt-3">
                                        <div class="col-xl-12">
                                            <div class="form-outline mb-2">
                                                <input type="text" value="{{ request()->search }}" name="search" id="datatable-filter" class="form-control form-control-lg" required>
                                                <label for="datatable-filter" class="form-label">Search request..</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div id="datatable-search" class="datatable">
                                    <div class="datatable-inner table-responsive ps" style="overflow: auto; position: relative;">
                                        <table class="table datatable-table">
                                            <thead class="datatable-header">
                                                <tr>
                                                    <th style="cursor: pointer;" scope="col">
                                                        <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                        <span class="fw-bold">Date of Filing</span>
                                                    </th>

                                                    <th style="cursor: pointer;" scope="col">
                                                        <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                        <span class="fw-bold">Date managed</span>
                                                    </th>

                                                    <th style="cursor: pointer;" scope="col">
                                                        <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                        <span class="fw-bold">Name</span>
                                                    </th>

                                                    <th style="cursor: pointer;" scope="col">
                                                        <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                        <span class="fw-bold">Status</span>
                                                    </th>

                                                    <th style="cursor: pointer;" scope="col">
                                                        <span class="fw-bold">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ( $managedRequests as $lr )
                                                    @php
                                                        $a = \DB::table('leave_request_tracks')->where([ 'leave_request_id' => $lr->id ])->orderBy('created_at', 'DESC')->first();
                                                    @endphp

                                                    <tr scope="row" data-mdb-index="0">
                                                        <td data-mdb-field="field_1" false=""><div style="padding-top: 5px;">{{ $lr->dateoffiling }}</div></td>
                                                        <td data-mdb-field="field_1" false="">
                                                            <div style="padding-top: 5px;">
                                                                {{ date('m-d-Y h:i A', strtotime($a->created_at)) }}
                                                            </div>
                                                        </td>
                                                        <td data-mdb-field="field_1" false=""><div style="padding-top: 5px;">{{ $lr->firstname . ' ' .  $lr->middlename . ' ' .  $lr->lastname }}</div></td>
                                                        <td data-mdb-field="field_1" false="">
                                                            <div style="padding-top: 5px;">
                                                                {{ $a->trackStatus  }}
                                                            </div>
                                                        </td>
                                                        <td data-mdb-field="field_1" false="">
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-warning me-2 d-flex align-items-center" data-mdb-toggle="modal" data-mdb-target="#view_{{ $lr->id }}">
                                                                    <span class="material-icons-outlined me-2">visibility</span>
                                                                    View
                                                                </button>

                                                                @include('includes.view-dh-leave')
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

