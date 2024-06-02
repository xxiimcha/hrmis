@extends('includes.layout')

@section('content')
    @include('includes.mayor-menu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <h2 class="h1 fw-bold">Employee</h2>
                <h1 class="h6 pb-2">
                Your Profile, Your Identity, Your Story.
                </h1>

                <div class="card mb-3 shadow-none">
                    <div class="card-body p-0">
                        <form method="GET">
                            <div class="row mb-4 mt-3">
                                <div class="col-xl-12">
                                    <div class="form-outline mb-2">
                                        <input type="text" value="{{ request()->search }}" name="search" id="datatable-filter" class="form-control form-control-lg" required>
                                        <label for="datatable-filter" class="form-label">Search employee..</label>
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
                                                <span class="fw-bold">Employee No.</span>
                                            </th>

                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_2" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">First name</span>
                                            </th>

                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_3" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">Middle name</span>
                                            </th>

                                            <th style="cursor: pointer;" scope="col">
                                                <span data-mdb-sort="field_4" class="datatable-sort-icon material-icons-outlined">arrow_upward</span>
                                                <span class="fw-bold">Lastname</span>
                                            </th>

                                            <th style="cursor: pointer;" scope="col">
                                                <span class="fw-bold">Action</span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ( $employees as $employee )
                                            <tr scope="row" data-mdb-index="0">
                                                <td data-mdb-field="field_1" false=""><div style="padding-top: 5px;">{{ $employee->employeeInfo->employee_number }}</div></td>
                                                <td data-mdb-field="field_2" false=""><div style="padding-top: 5px;">{{ ucwords($employee->employeeInfo->firstname) }}</div></td>
                                                <td data-mdb-field="field_3" false=""><div style="padding-top: 5px;">{{ ucwords($employee->employeeInfo->middlename) }}</div></td>
                                                <td data-mdb-field="field_4" false=""><div style="padding-top: 5px;">{{ ucwords($employee->employeeInfo->lastname) }}</div></td>

                                                <td>
                                                    <div style="padding-top: 3px;">
                                                        <a href="/welcome/mayor/employee/profile/{{ $employee->id }}" class="d-flex align-items-center">
                                                            <span class="material-icons-outlined me-2" style="font-size: 20px">settings_accessibility</span>
                                                            View
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
            </section>
        </div>
    </main>
@stop
