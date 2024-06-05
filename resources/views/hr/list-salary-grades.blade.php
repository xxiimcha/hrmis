@extends('includes.layout')

@section('content')
    @include('includes.hrmenu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Salary Grades</li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/welcome/hr/salary-grade/list">List</a></li>
                    </ol>
                </nav>

                <div class="card mb-3 shadow-none">
                    <div class="card-body p-0">
                        <form method="GET">
                            <div class="row mb-4 mt-3">
                                <div class="col-xl-12">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ request()->search }}" name="search" id="datatable-filter" class="form-control form-control-lg" required>
                                        <label for="datatable-filter" class="form-label">Search salary grade..</label>
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
                                                <span class="fw-bold">Step 1</span>
                                            </th>
                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">Step 2</span>
                                            </th>
                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">Step 3</span>
                                            </th>
                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">Step 4</span>
                                            </th>
                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">Step 5</span>
                                            </th>
                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">Step 6</span>
                                            </th>
                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">Step 7</span>
                                            </th>
                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_1" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">Step 8</span>
                                            </th>
                                            <th style="cursor: pointer;" scope="col">
                                                <span class="fw-bold">Action</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($salaryGrades as $sg)
                                            <tr scope="row" data-mdb-index="0">
                                                <td data-mdb-field="field_1"><div style="padding-top: 5px;">{{ $sg->step_1 ? '₱' . number_format($sg->step_1, 2) : 'N/A' }}</div></td>
                                                <td data-mdb-field="field_1"><div style="padding-top: 5px;">{{ $sg->step_2 ? '₱' . number_format($sg->step_2, 2) : 'N/A' }}</div></td>
                                                <td data-mdb-field="field_1"><div style="padding-top: 5px;">{{ $sg->step_3 ? '₱' . number_format($sg->step_3, 2) : 'N/A' }}</div></td>
                                                <td data-mdb-field="field_1"><div style="padding-top: 5px;">{{ $sg->step_4 ? '₱' . number_format($sg->step_4, 2) : 'N/A' }}</div></td>
                                                <td data-mdb-field="field_1"><div style="padding-top: 5px;">{{ $sg->step_5 ? '₱' . number_format($sg->step_5, 2) : 'N/A' }}</div></td>
                                                <td data-mdb-field="field_1"><div style="padding-top: 5px;">{{ $sg->step_6 ? '₱' . number_format($sg->step_6, 2) : 'N/A' }}</div></td>
                                                <td data-mdb-field="field_1"><div style="padding-top: 5px;">{{ $sg->step_7 ? '₱' . number_format($sg->step_7, 2) : 'N/A' }}</div></td>
                                                <td data-mdb-field="field_1"><div style="padding-top: 5px;">{{ $sg->step_8 ? '₱' . number_format($sg->step_8, 2) : 'N/A' }}</div></td>
                                                <td data-mdb-field="field_1">
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-sm btn-warning me-2 d-flex align-items-center" data-mdb-toggle="modal" data-mdb-target="#view_{{ $sg->id }}">
                                                            <span class="material-icons-outlined me-2">visibility</span>
                                                            View
                                                        </button>
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
            </section>
        </div>
    </main>
@stop
