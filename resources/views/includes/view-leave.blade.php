<div class="modal fade" id="view_{{ $lr->id }}" tabindex="-1" aria-labelledby="other-skills-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="other-skills-modal">Leave Request Details</h5>
            </div>

            <div class="modal-body pt-0 px-4">
                <ul class="nav nav-tabs" id="ex-with-icons" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active d-flex align-items-center justify-content-center fw-bold" id="details0" data-mdb-toggle="tab" href="#details_{{ $lr->id }}" role="tab" aria-controls="details_{{ $lr->id }}" aria-selected="true">
                            <span class="material-icons-outlined me-2">info</span> Details
                        </a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link d-flex align-items-center justify-content-center fw-bold" id="tracking0" data-mdb-toggle="tab" href="#tracking_{{ $lr->id }}" role="tab" aria-controls="tracking_{{ $lr->id }}" aria-selected="true">
                            <span class="material-icons-outlined me-2">insights</span> Tracking
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="info-content">
                    <div class="tab-pane fade show active py-2" id="details_{{ $lr->id }}" role="tabpanel" aria-labelledby="details_{{ $lr->id }}">
                        <div class="row small mt-3">
                            <div class="col-xl-2">
                                <strong>Office/Department :</strong>
                            </div>

                            <div class="col-xl-10">
                                {{ ucwords($lr->departmentInfo->name) }}
                            </div>
                        </div>
                        <hr>

                        <div class="row small mt-4">
                            <div class="col-xl-2">
                                <strong>Date of Filing :</strong>
                            </div>

                            <div class="col-xl-10">
                                {{ $lr->dateoffiling }}
                            </div>
                        </div>
                        <hr>

                        <div class="row small mt-4">
                            <div class="col-xl-2">
                                <strong>Position :</strong>
                            </div>

                            <div class="col-xl-10">
                                {{ ucwords($lr->position) }}
                            </div>
                        </div>
                        <hr>


                        <p class="small">** Type of leave to be availed of **</p>

<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    @php
        // Create an array of available leave types
        $availableLeaveTypes = [
            1 => 'Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementing E.O 292)',
            2 => 'Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementing E.O 292)',
            3 => 'Sick Leave (Sec. 43, Rule XV, Omnibus Rules Implementing E.O 292)',
            4 => 'Maternity Leave (R.A No. 11210/IRR issued by CSC, DOLE and SSS)',
            5 => 'Paternity Leave (R.A No. 8187/CSC MC No. 71, s. 1998, as amended)',
            6 => 'Special Privilege Leave (Sec. 21, Rule XVI, Omnibus Rules Implementing E. O. No. 292)',
            7 => 'Solo Parent Leave (R.A. No. 8972/CSC MC No. 8, s. 2004)',
            8 => 'Study Leave (Sec.68, Rule XVI, Omnibus Rules Implementing E.O. No. 292)',
            9 => '10-Day VAWC Leave (R.A. No. 9262/CSC MC No. 15, s. 2005)',
            10 => 'Rehabilitation Privilege (Sec. 55, Rule XVI, Omnibus Rules Implementing E.O. No. 292)',
            11 => 'Special Leave Benefits for Women (R.A. No. 9710/CSC Mc No.25, s. 2010)',
            12 => 'Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)',
            13 => 'Adoption Leave (R.A. No. 8552)',
            // Add other leave types as needed
        ];
    @endphp

    @foreach($availableLeaveTypes as $typeId => $leaveType)
        @if (in_array($typeId, explode(',', $lr->typeofleave6A)))
            <div>
            &nbsp;&nbsp;&nbsp;&nbsp; {{ $leaveType }}
            </div>

        @endif
    @endforeach
</form>

<div class="row small mt-4">    
    @if ($lr->othersOf6A)
        <p class="form-control-static"><strong>Others :</strong> {{ $lr->othersOf6A }}</p>
    @else
        <p class="form-control-static text-muted">(No value specified)</p>
    @endif
    </div>
</form>
<hr>
<p class="small">** Details of Leave **</p>

<div class="form-check" style="display: @if(in_array(1, explode(',', $lr->detailsOfLeave6B))) block @else none @endif;">
    Within the Philippines
</div>

<div class="form-check" style="display: @if(in_array(2, explode(',', $lr->detailsOfLeave6B))) block @else none @endif;">
    Abroad
</div>

<div class="form-check" style="display: @if(in_array(3, explode(',', $lr->detailsOfLeave6B))) block @else none @endif;">
    In Hospital
</div>

<div class="form-check" style="display: @if(in_array(4, explode(',', $lr->detailsOfLeave6B))) block @else none @endif;">
    Out Patient
</div>

<div class="form-check" style="display: @if(in_array(5, explode(',', $lr->detailsOfLeave6B))) block @else none @endif;">
    Special Leave Benefits for Women
</div>

<div class="form-check" style="display: @if(in_array(6, explode(',', $lr->detailsOfLeave6B))) block @else none @endif;">
    Completion of Master's Degree
</div>

<div class="form-check" style="display: @if(in_array(7, explode(',', $lr->detailsOfLeave6B))) block @else none @endif;">
    BAR/Board Examination Review
</div>

<div class="form-check" style="display: @if(in_array(8, explode(',', $lr->detailsOfLeave6B))) block @else none @endif;">
    Monetization of Leave Credits
</div>

<div class="form-check" style="display: @if(in_array(9, explode(',', $lr->detailsOfLeave6B))) block @else none @endif;">
    Terminal Leave
</div>

    <div class="row small mt-4">
                            <div class="col-xl-2">
                                
                            </div>
    @if ($lr->detailsOfLeave6BReason)
        <p class="form-control-static"><strong>Specify details :</strong> {{ $lr->detailsOfLeave6BReason }}</p>
    @else
        <p class="form-control-static text-muted">(No value specified)</p>
    @endif
    </div>

    <script>
        document.querySelectorAll('input[name="leaveDetails"]').forEach(function (radio) {
            radio.addEventListener('change', function () {
                var selectedValue = document.querySelector('input[name="leaveDetails"]:checked').value;

                // Hide all detail containers
                document.querySelectorAll('.form-check').forEach(function (container) {
                    var containerValue = container.querySelector('input[name="leaveDetails"]').value;
                    if (containerValue !== selectedValue) {
                        container.style.display = 'none';
                    } else {
                        container.style.display = 'block';
                    }
                });
            });
        });
    </script>
<hr>
<div class="form-outline mb-3">
    <input type="text" required id="inclusivedates6C" value="{{ $lr->inclusiveDates6C }}" name="inclusivedates6C" class="active form-control form-control-lg" disabled>
    <label class="form-label active" for="inclusivedates6C" style="margin-left: 0px; color: green;">Inclusive Dates</label>
</div>

    <div class="row small mt-1">
    @if ($lr->numberOfWorkingDays6C)
         <p class="form-control-static"><strong>Number of working days applied for :</strong> {{ $lr->numberOfWorkingDays6C }}</p>
    @else
        <p class="form-control-static text-muted">(No value specified)</p>
    @endif
    </div>

                        <p class="small">** Commutation **</p>

                        <div class="form-check">
                            <input class="form-check-input" disabled type="radio" @if (in_array(1, explode(',', $lr->commutation6D))) checked @endif  id="inlineRadio9" value="1" />
                            <label class="form-check-label" for="inlineRadio9">Not Requested</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" disabled type="radio" @if (in_array(2, explode(',', $lr->commutation6D))) checked @endif  id="inlineRadio10" value="2" />
                            <label class="form-check-label" for="inlineRadio10">Requested</label>
                        </div>
                    </div>

                    <div class="tab-pane fade py-2" id="tracking_{{ $lr->id }}" role="tabpanel" aria-labelledby="tracking_{{ $lr->id }}">
                        <ol class="report-progress mt-3">
                            @foreach($lr->trackingInfo as $history)
                                <li>
                                    <div class="fw-bold small">
                                        {!! $history['trackStatus'] . ' <span class="text-muted">as of ' . date('m-d-Y h:i A', strtotime($history['created_at'])) . '</span>' !!}
                                    </div>
                                    <div class="small d-flex align-items-center">
                                        {{ $history['message'] }} . @if($history['trackStatus'] == 'Done') <a href="#" onclick="downloadLeaveForm()" class="text-success ms-2 d-flex align-items-center"><span class="material-icons-outlined me-1">download</span> <strong>Download form</strong></a> @endif
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function downloadLeaveForm(){
        window.location.href = window.location.pathname + '/downloadLeaveForm';
    }
</script>
