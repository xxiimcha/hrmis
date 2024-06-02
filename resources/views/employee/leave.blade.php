@extends('includes.layout')

@section('extra_css')
<style>
    .report-progress {
        list-style: none;
        font-size: 12pt;
    }

    .report-progress li {
        border-left: 0.15em solid rgba(0, 0, 0, 0.2);
        padding: 0 0 0.1em 1em;
        position: relative;
        padding-bottom: 10px;
    }

    .report-progress .activated {
        border-left: 0.17em solid rgba(184, 134, 11, 0.6) !important;
    }

    .report-progress li::before {
        content: "•";
        font-size: 2.5em;
        color: gray;
        position: absolute;
        left: -0.19em;
        top: -0.48em;
    }

    .report-progress .activated::before {
        color: darkgoldenrod;
        font-size: 3.5em;
        top: -0.55em;
    }
</style>
@stop

@section('content')
    @include('includes.employee-menu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Leave</li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/welcome/employee/leave/list">My Requests</a></li>
                    </ol>
                </nav>

                @include('includes.message')

                <div class="card mb-3 shadow-none">
                    <div class="card-body p-0">
                        <div class="card mb-3 shadow-none">
                            <div class="card-body p-0">
                                <form method="GET">
                                    <div class="row mb-4 mt-3">
                                        <div class="col-xl-12">
                                            <div class="form-outline mb-2">
                                                <input type="text" name="search" id="datatable-filter" class="form-control form-control-lg" required>
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
                                                        <span data-mdb-sort="field_2" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                        <span class="fw-bold">Status</span>
                                                    </th>

                                                    <th style="cursor: pointer;" scope="col">
                                                        <span class="fw-bold">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ( $leaveRequests as $lr )
                                                    <tr scope="row" data-mdb-index="0">
                                                        <td data-mdb-field="field_1" false=""><div style="padding-top: 5px;">{{ $lr->dateoffiling }}</div></td>
                                                        <td data-mdb-field="field_1" false=""><div style="padding-top: 5px;">{{ $lr->status }}</div></td>
                                                        <td data-mdb-field="field_1" false="">
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-warning me-2 d-flex align-items-center" data-mdb-toggle="modal" data-mdb-target="#view_{{ $lr->id }}">
                                                                    <span class="material-icons-outlined me-2">visibility</span>
                                                                    View
                                                                </button>

                                                                @include('includes.view-leave')

                                                                <a role="button" href="/welcome/employee/leave/list/remove/{{ $lr->id }}" class="btn btn-sm btn-danger bluish_button d-flex align-items-center @if ($lr->status !== 'Pending') sr-only @endif">
                                                                    <span class="material-icons-outlined me-2">delete</span>
                                                                    remove
                                                                </a>
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

@section('extra_js')
    <script>
        document.querySelectorAll(".report-progress > li")[0].className += 'activated';
    </script>
@stop

