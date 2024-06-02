<div class="modal fade" id="sr_{{ $sr->id }}" tabindex="-1" aria-labelledby="new-service-record" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="new-service-record">Add to list</h5>
            </div>

            <div class="modal-body" style="max-height: 400px; overflow-y: auto">
                <form action="/welcome/hr/employee/all/info/{{ $employee->id }}/editServiceRecord/{{ $sr->id }}" method="POST">
                    <p class="small text-left">Service</p>

                    {{ csrf_field() }}

                    <div class="form-outline mb-2">
                        <input type="date" id="fromDate" value="{{ $sr->fromDate }}" class="form-control form-control-lg active" name="fromDate" required>
                        <label class="form-label active" for="fromDate" style="margin-left: 0px;">Inclusive Dates - From <small class="text-muted">(required)</small></label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="date" id="toDate" value="{{ $sr->toDate }}" class="form-control form-control-lg active" name="toDate">
                        <label class="form-label active" for="toDate" style="margin-left: 0px;">Inclusive Dates - To</label>
                    </div>

                    <p class="small text-left">Record of Employment</p>

                    <div class="form-outline mb-2">
                        <input type="text" value="{{ $sr->designation }}" id="designation" required class="form-control form-control-lg" name="designation">
                        <label class="form-label" for="designation" style="margin-left: 0px;">Designation</label>
                    </div>

                    <select name="status" class="form-control select">
                        <option disabled>Status</option>
                        <option value="Casual" @if ($sr->status == 'Casual') selected @endif>Casual</option>
                        <option value="Regular" @if ($sr->status == 'Regular') selected @endif>Regular</option>
                    </select>

                    <p class="small mt-3">Salary</p>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-outline mb-2">
                                <input type="number" value="{{ $sr->salary }}" id="salary" name="salary" class="form-control form-control-lg" required>
                                <label class="form-label" for="salary" style="margin-left: 0px;">₱</label>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <select name="salaryMode" class="form-control select">
                                <option disabled>Mode</option>
                                <option value="day" @if ($sr->salaryMode == 'day') selected @endif>Day</option>
                                <option value="mo" @if ($sr->salaryMode == 'mo') selected @endif>Month</option>
                                <option value="week" @if ($sr->salaryMode == 'week') selected @endif>Week</option>
                                <option value="ann" @if ($sr->salaryMode == 'ann') selected @endif>Annual</option>
                            </select>
                        </div>
                    </div>

                    <select name="office" class="select form-control" data-mdb-container="#sr_{{ $sr->id }}" data-mdb-filter="true">
                        <option disabled>Office or Entity/Division</option>

                        @foreach ($departments as $dep)
                            <option @if ($dep->id == $sr->department_id) selected @endif value="{{ $dep->id }}">{{ ucwords($dep->name) }}</option>
                        @endforeach
                    </select>

                    <div class="form-outline my-2">
                        <input type="text" id="branch" value="{{ $sr->branch }}" name="branch" class="form-control form-control-lg" required>
                        <label class="form-label" for="branch" style="margin-left: 0px;">Branch National Municipal</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="text" id="leaves" value="{{ $sr->leaves }}" name="leaves" class="form-control form-control-lg">
                        <label class="form-label" for="leaves" style="margin-left: 0px;">Leaves of Absences w/o pay</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="text" id="remarks" value="{{ $sr->remarks }}" name="remarks" class="form-control form-control-lg" required>
                        <label class="form-label" for="remarks" style="margin-left: 0px;">Remarks</label>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
