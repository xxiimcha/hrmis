@extends('includes.layout')

@section('content')
    @include('includes.hrmenu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <h2 class="h1 fw-bold">Departments</h2>

                <!-- Nav tabs -->
                <div class="d-flex align-items-center position-relative" style="padding: 0 50px;">
                    <button class="btn btn-light position-absolute start-0 prev-btn" id="prev-btn"><span class="material-icons">arrow_back</span></button>
                    <ul class="nav nav-tabs flex-nowrap w-100" id="myTab" role="tablist" style="overflow: hidden;">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                        </li>
                        @foreach($departments as $department)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="dept-{{ $department->id }}-tab" data-bs-toggle="tab" href="#dept-{{ $department->id }}" role="tab" aria-controls="dept-{{ $department->id }}" aria-selected="false">{{ $department->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <button class="btn btn-light position-absolute end-0 next-btn" id="next-btn"><span class="material-icons">arrow_forward</span></button>
                </div>

                <!-- Tab content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Employee Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departments as $department)
                                        @if(isset($employeesByDepartment[$department->id]))
                                            @foreach($employeesByDepartment[$department->id] as $employee)
                                                <tr>
                                                    <td>{{ $department->name }}</td>
                                                    <td>{{ $employee->firstname }} {{ $employee->middlename }} {{ $employee->lastname }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @foreach($departments as $department)
                        <div class="tab-pane fade" id="dept-{{ $department->id }}" role="tabpanel" aria-labelledby="dept-{{ $department->id }}-tab">
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($employeesByDepartment[$department->id]))
                                            @foreach($employeesByDepartment[$department->id] as $employee)
                                                <tr>
                                                    <td>{{ $employee->firstname }} {{ $employee->middlename }} {{ $employee->lastname }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>No employees found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@stop

@section('extra_css')
<style>
    .nav-tabs {
        overflow-x: auto;
        white-space: nowrap;
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    .nav-tabs::-webkit-scrollbar {
        display: none;  /* Chrome, Safari, and Opera */
    }
    .prev-btn, .next-btn {
        z-index: 1;
        background-color: white;
    }
</style>
@stop

@section('extra_js')
<script>
    document.getElementById('next-btn').addEventListener('click', function() {
        document.querySelector('#myTab').scrollBy({ left: 200, behavior: 'smooth' });
    });

    document.getElementById('prev-btn').addEventListener('click', function() {
        document.querySelector('#myTab').scrollBy({ left: -200, behavior: 'smooth' });
    });

    // Ensure Bootstrap Tabs are clickable
    const triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'));
    triggerTabList.forEach(function (triggerEl) {
        const tabTrigger = new bootstrap.Tab(triggerEl);

        triggerEl.addEventListener('click', function (event) {
            event.preventDefault();
            tabTrigger.show();
        });
    });
</script>
@stop
