@extends('includes.layout')

@section('content')
    @include('includes.employee-menu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Leave</li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/welcome/employee/leave/new">New Request</a></li>
                    </ol>
                </nav>

                @include('includes.message')

                <div class="card mb-3 shadow-none">
                    <div class="card-body p-0">
                        <div class="row small mt-3">
                            <div class="col-xl-2">
                                <strong>Office/Department :</strong>
                            </div>

                            <div class="col-xl-10">
                                {{ ucwords($myInfo->employeeDepartment->name) }}
                            </div>
                        </div>
                        <hr>

                        <div class="row small mt-4">
                            <div class="col-xl-2">
                                <strong>Date of Filing :</strong>
                            </div>

                            <div class="col-xl-10">
                                {{ date('m-d-Y') }}
                            </div>
                        </div>
                        <hr>

                        <div class="row small mt-4">
                            <div class="col-xl-2">
                                <strong>Position :</strong>
                            </div>

                            <div class="col-xl-10">
                                {{ ucwords($myInfo->position) }}
                            </div>
                        </div>
                        <hr>

                        <div class="row small mt-4">
                            <div class="col-xl-2">
                                <strong>Salary :</strong>
                            </div>

                            <div class="col-xl-10">
                                ₱{{ $currentSalary->salary . ' per ' . $currentSalary->mode }}
                            </div>
                        </div>

                        <p class="mt-4">Details of Application</p>

                        <p class="small">** Type of leave to be availed of **</p>

                        <form action="" method="POST" enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}

                            <label for="leaveType" class="small">Select Leave Type:</label>

                            <div class="form-group mt-2">
                                <select class="form-control form-control-lg select" data-mdb-filter="true" id="leaveType" name="selectedLeaveType">
                                    @if ($vacationLeave > 0)
                                        <option value="1">Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementing E.O 292)</option>
                                    @endif
                                    @if ($mandatoryLeave > 0)
                                        <option value="2">Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementing E.O 292)</option>
                                    @endif
                                    @if ($sickLeave > 0)
                                        <option value="3">Sick Leave (Sec. 43, Rule XV, Omnibus Rules Implementing E.O 292)</option>
                                    @endif
                                    @if ($maternityLeave > 0)
                                        <option value="4">Maternity leave (R.A No. 11210/IRR issued by CSC, DOLE and SSS)</option>
                                    @endif
                                    @if ($paternityLeave > 0)
                                        <option value="5">Paternity leave (R.A No. 8187 CSC MC N0. 71, s. 1998, as amended)</option>
                                    @endif
                                    @if ($specialPrivilegeLeave > 0)
                                        <option value="6">Special Privilege Leave (Sec. 21, Rule XVI, Omnibus Rules Implementing E.O 292)</option>
                                    @endif
                                    @if ($soloParentLeave > 0)
                                        <option value="7">Solo Parent Leave (R.A No. 8972/CSC Mc No. 8, s.2004)</option>
                                    @endif
                                    @if ($studyLeave > 0)
                                        <option value="8">Study Leave (Sec. 68, Rule XVI, Omnibus Rules Implementing E.O 292)</option>
                                    @endif
                                    @if ($vawcLeave > 0)
                                        <option value="9">10-Day VAWC Leave (R.A No. 9262/CSC MC No. 15, s. 2005)</option>
                                    @endif
                                    @if ($rehabilitationLeave > 0)
                                        <option value="10">Rehabilitation Privilege (Sec. 55, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</option>
                                    @endif
                                    @if ($specialLeaveForWomen > 0)
                                        <option value="11">Special Leave Benefits for Women (R.A No. 9710/CSC MC No. 25, s. 2010)</option>
                                    @endif
                                    @if ($specialEmergencyLeave > 0)
                                        <option value="12">Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)</option>
                                    @endif
                                    @if ($adoptionLeave > 0)
                                        <option value="13">Adoption Leave (R.A. No. 8552)</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-outline mt-2 mb-3">
                                <input type="text" id="others6A" name="others6A" class="form-control form-control-lg">
                                <label class="form-label" for="others6A" style="margin-left: 0px;">Others</label>
                            </div>

                            <p class="small">** Details of Leave **</p>

                            <label for="leaveDetailsSelect" class="small">Select Leave Details:</label>

                            <div class="form-group mt-2">
                                <select class="form-control form-control-lg select" data-mdb-filter="true" id="leaveDetailsSelect" name="selectedLeaveDetails">
                                    <option value="1">Within the Philippines</option>
                                    <option value="2">Abroad</option>
                                    <option value="3">In Hospital</option>
                                    <option value="4">Out Patient</option>
                                    <option value="5">Special Leave Benefits for Women</option>
                                    <option value="6">Completion of Master's Degree</option>
                                    <option value="7">BAR/Board Examination Review</option>
                                    <option value="8">Monetization of Leave Credits</option>
                                    <option value="9">Terminal Leave</option>
                                </select>
                            </div>

                            <div class="form-outline my-3">
                                <input type="text" id="details6B" name="details6B" class="form-control form-control-lg">
                                <label class="form-label" for="details6B" style="margin-left: 0px;">Specify details</label>
                            </div>

                            <!-- Include Bootstrap CSS (adjust the paths if necessary) -->
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

                            <!-- Include Bootstrap Date Range Picker CSS (adjust the paths if necessary) -->
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker/daterangepicker.css">

                            <!-- Include jQuery and Moment.js (required for Bootstrap Date Range Picker) -->
                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

                            <!-- Include Bootstrap JS and Popper.js (adjust the paths if necessary) -->
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

                            <!-- Include Bootstrap Date Range Picker JS (adjust the paths if necessary) -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker/daterangepicker.min.js"></script>

                            <style>
                                .removeDate {
                                    display: none; /* Initially hide the remove button */
                                }
                            </style>

                            <div class="form-group">
                                <label for="inclusivedates6C">Select Date Range:</label>
                                <div class="date-ranges-container">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg datepicker" autocomplete="off" id="inclusivedates6C" name="inclusivedates6C" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary removeDate" type="button">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-secondary addDate" type="button">+</button>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const dateRangesContainer = document.querySelector(".date-ranges-container");
                                    const numberOfDaysInput = document.getElementById("numberofdays6C");
                                    let selectedRanges = [];

                                    function initDateRangePicker(element, index) {
                                        $(element).daterangepicker({
                                            autoApply: true,
                                            autoUpdateInput: false,
                                            locale: {
                                                format: 'YYYY-MM-DD',
                                            },
                                            isInvalidDate: function (date) {
                                                // Disable weekends (Saturday and Sunday)
                                                const dayOfWeek = date.day();
                                                return dayOfWeek === 0 || dayOfWeek === 6;
                                            },
                                            showCustomRangeLabel: false,
                                        }, function (start, end, label) {
                                            // Update the input field to display the selected dates
                                            const formattedRange = `From: ${start.format('YYYY-MM-DD')} To: ${end.format('YYYY-MM-DD')}`;
                                            $(this.element).val(formattedRange);

                                            // Check for duplicate range
                                            if (!isDuplicateRange(start, end, index)) {
                                                // Update the selectedRanges array with the selected dates
                                                selectedRanges[index] = { start: start.clone(), end: end.clone() };
                                                // Trigger change event to recalculate working days
                                                $(this.element).trigger('change');
                                            } else {
                                                // Handle duplicate range (e.g., show an error message)
                                                alert("You have already selected this date range.");
                                                // Clear the input field
                                                $(this.element).val('');
                                            }
                                        });
                                    }

                                    function calculateWorkingDays() {
                                        let workingDays = 0;

                                        // Calculate working days, excluding weekends, for all selected ranges
                                        for (const range of selectedRanges) {
                                            if (range.start && range.end) {
                                                let currentDate = range.start.clone();
                                                while (currentDate.isSameOrBefore(range.end)) {
                                                    const dayOfWeek = currentDate.day();
                                                    if (dayOfWeek !== 0 && dayOfWeek !== 6) {
                                                        workingDays++;
                                                    }
                                                    currentDate.add(1, 'day');
                                                }
                                            }
                                        }

                                        numberOfDaysInput.value = workingDays;

                                        // Check the number of date pickers and disable/enable remove button accordingly
                                        const removeButtons = document.querySelectorAll('.removeDate');
                                        removeButtons.forEach((button, index) => {
                                            button.disabled = dateRangesContainer.childElementCount <= 1;
                                        });
                                    }

                                    function addDateRange() {
                                        // Get the existing date ranges
                                        const existingRanges = selectedRanges.map(range => ({
                                            start: range.start ? range.start.format('YYYY-MM-DD') : null,
                                            end: range.end ? range.end.format('YYYY-MM-DD') : null,
                                        }));

                                        // Check for duplicate range
                                        const isDuplicate = selectedRanges.some(range => range.start && range.end && range.start.isSame(range.end));

                                        if (!isDuplicate) {
                                            const newInputGroup = document.createElement('div');
                                            newInputGroup.className = 'input-group mt-2';
                                            newInputGroup.innerHTML = `
                                                <input type="text" class="form-control form-control-lg datepicker" autocomplete="off">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary removeDate" type="button">-</button>
                                                </div>
                                            `;
                                            dateRangesContainer.appendChild(newInputGroup);

                                            const index = selectedRanges.push({ start: null, end: null }) - 1;
                                            initDateRangePicker(newInputGroup.querySelector('.datepicker'), index);
                                            calculateWorkingDays(); // Call calculateWorkingDays after adding a new date picker

                                            // Show the remove button after adding a new date picker
                                            newInputGroup.querySelector('.removeDate').style.display = 'inline-block';
                                        } else {
                                            // Handle duplicate range (e.g., show an error message)
                                            alert("You have already selected this date range.");
                                        }
                                    }

                                    function isDuplicateRange(newStart, newEnd, currentIndex) {
                                        // Check if the new range already exists in selectedRanges
                                        for (let i = 0; i < selectedRanges.length; i++) {
                                            if (i !== currentIndex) {
                                                const range = selectedRanges[i];
                                                if (newStart.isSame(range.start) && newEnd.isSame(range.end)) {
                                                    return true; // Duplicate found
                                                }
                                            }
                                        }
                                        return false; // No duplicate found
                                    }

                                    initDateRangePicker('.datepicker', 0);

                                    $(document).on('hide.daterangepicker', '.datepicker', function () {
                                        calculateWorkingDays();
                                    });

                                    $(document).on('change', '.datepicker', function () {
                                        calculateWorkingDays();
                                    });

                                    $(document).on('click', '.addDate', function () {
                                        addDateRange();
                                    });

                                    $(document).on('click', '.removeDate', function () {
                                        const container = $(this).closest('.input-group');
                                        const index = container.index();
                                        selectedRanges.splice(index, 1);
                                        container.remove();
                                        calculateWorkingDays();
                                    });
                                });
                            </script>

                            <p class="bold">Number of working days applied for</p>
                            <div class="form-outline mb-2">
                                <input type="number" required id="numberofdays6C" name="numberofdays6C" class="form-control form-control-lg" readonly>
                                <label class="form-label" for="numberofdays6C" style="margin-left: 0px;"></label>
                            </div>

                            <p class="small">** Commutation **</p>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="commutation" id="inlineRadio9" value="1" />
                                <label class="form-check-label" for="inlineRadio9">Not Requested</label>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="commutation" id="inlineRadio10" value="2" />
                                <label class="form-check-label" for="inlineRadio10">Requested</label>
                            </div>

                            <button type="submit" class="btn btn-success mb-3">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
@stop
