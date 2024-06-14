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
                            <a class="nav-link active" id="all-tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                        </li>
                        @foreach($departments as $department)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="dept-{{ $department->id }}-tab" href="#dept-{{ $department->id }}" role="tab" aria-controls="dept-{{ $department->id }}" aria-selected="false">{{ $department->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <button class="btn btn-light position-absolute end-0 next-btn" id="next-btn"><span class="material-icons">arrow_forward</span></button>
                </div>

                <!-- Filter for Sex -->
                <div class="mt-3">
                    <label for="filterSex">Filter by Sex:</label>
                    <select id="filterSex" class="form-select">
                        <option value="all">All</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <!-- Tab content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="table-responsive mt-3">
                            <button class="btn btn-primary mb-3" onclick="downloadPDF('all')">Download as PDF</button>
                            <table class="table table-bordered" id="all-table">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Employee Name</th>
                                        <th>Sex</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departments as $department)
                                        @if(isset($employeesByDepartment[$department->id]))
                                            @foreach($employeesByDepartment[$department->id] as $employee)
                                                <tr>
                                                    <td>{{ $department->name }}</td>
                                                    <td>{{ $employee->firstname }} {{ $employee->middlename }} {{ $employee->lastname }}</td>
                                                    <td>{{ $employee->sex }}</td>
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
                                <button class="btn btn-primary mb-3" onclick="downloadPDF('dept-{{ $department->id }}')">Download as PDF</button>
                                <table class="table table-bordered" id="dept-{{ $department->id }}-table">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Sex</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($employeesByDepartment[$department->id]))
                                            @foreach($employeesByDepartment[$department->id] as $employee)
                                                <tr>
                                                    <td>{{ $employee->firstname }} {{ $employee->middlename }} {{ $employee->lastname }}</td>
                                                    <td>{{ $employee->sex }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="2">No employees found</td>
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
    .nav-link {
        display: inline-block;
        padding: 10px;
        cursor: pointer;
    }
    .nav-link.active {
        background-color: #e9ecef;
    }
    .tab-pane {
        display: none;
    }
    .tab-pane.show {
        display: block;
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

    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#myTab .nav-link');
        const tabPanes = document.querySelectorAll('.tab-pane');
        const filterSexElement = document.getElementById('filterSex');

        tabs.forEach(tab => {
            tab.addEventListener('click', function(event) {
                event.preventDefault();
                const target = document.querySelector(tab.getAttribute('href'));

                tabs.forEach(t => t.classList.remove('active'));
                tabPanes.forEach(pane => pane.classList.remove('show', 'active'));

                tab.classList.add('active');
                target.classList.add('show', 'active');
                filterSex();  // Apply filter when tab changes
            });
        });

        filterSexElement.addEventListener('change', filterSex);

        function filterSex() {
            const selectedSex = filterSexElement.value.toLowerCase();
            const activeTab = document.querySelector('#myTab .nav-link.active');
            const activePaneId = activeTab.getAttribute('href').substring(1);
            const table = document.querySelector(`#${activePaneId}-table tbody`);
            const rows = table ? table.querySelectorAll('tr') : [];

            rows.forEach(row => {
                const sex = row.children[1]?.innerText.toLowerCase();
                if (selectedSex === 'all' || sex === selectedSex) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        window.downloadPDF = function(paneId) {
            const element = document.getElementById(`${paneId}-table`);
            html2pdf(element, {
                margin: 1,
                filename: `${paneId}.pdf`,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            });
        };
    });
</script>
@stop
