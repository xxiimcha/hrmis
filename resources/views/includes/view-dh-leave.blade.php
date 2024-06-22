<div class="modal fade" id="view_{{ $lr->id }}" tabindex="-1" aria-labelledby="other-skills-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="other-skills-modal">Leave Request Details</h5>
            </div>
            <div class="modal-body pt-1 px-4">
                <div class="row small mt-3">
                    <div class="col-xl-2">
                        <strong>Name :</strong>
                    </div>

                    <div class="col-xl-10">
                        {{ ucwords($lr->firstname) }}  {{ ucwords($lr->middlename) }}  {{ ucwords($lr->lastname) }}
                    </div>
                </div>
                <hr>

                <div class="row small mt-4">
                    <div class="col-xl-2">
                        <strong>Office/Department :</strong>
                    </div>

                    <div class="col-xl-10">
                        {{ $lr->name }}
                    </div>
                </div>

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

                <p class="mt-4">Details of Application</p>

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
                    <div class="col-xl-2"></div>
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
                    <input class="form-check-input" disabled type="radio" @if (in_array(1, explode(',', $lr->commutation6D))) checked @endif id="inlineRadio9" value="1" />
                    <label class="form-check-label" for="inlineRadio9">Not Requested</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" disabled type="radio" @if (in_array(2, explode(',', $lr->commutation6D))) checked @endif id="inlineRadio10" value="2" />
                    <label class="form-check-label" for="inlineRadio10">Requested</label>
                </div>
            </div>

            <div class="modal-footer">
                @if (strpos(url()->current(), '/leave/received'))
                    <a role="button" href="received/approved/{{ $lr->id }}" class="btn btn-success">accept</a>
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" data-mdb-toggle="modal" data-mdb-target="#dm_{{ $lr->id }}">reject</button>
                @endif

                <a role="button" href="{{ route('leave-request.pdf', ['id' => $lr->id]) }}" class="btn btn-primary">Download PDF</a>
                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-mdb-backdrop="static" id="dm_{{ $lr->id }}" tabindex="-1" aria-labelledby="other-skills-modal2">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border shadow">
            <div class="modal-header">
                <h5 class="modal-title small" id="other-skills-modal">Disapproval message</h5>
            </div>

            <div class="modal-body">
                <div class="form-outline mb-3">
                    <textarea class="form-control" required name="message" id="textAreaExample1_{{ $lr->id }}" rows="4"></textarea>
                    <label class="form-label" for="textAreaExample">Message</label>
                </div>

                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">close</button>
                <button type="button" class="btn btn-danger" id="done_{{ $lr->id }}">done</button>
            </div>
        </div>
    </div>
</div>

<script>
    $().ready(function() {
        $('#done_{{ $lr->id }}').click(function() {
            window.location.href = "/welcome/{{ auth()->user()->role == 1 ? 'hr' : ((auth()->user()->role == 3) ? 'mayor' : 'dh') }}/leave/received/rejected/{{ $lr->id }}?message=" + $('#textAreaExample1_{{ $lr->id }}').val();
        });
    });
</script>
