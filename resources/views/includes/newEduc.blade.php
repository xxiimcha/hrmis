<div class="modal fade" id="newEduc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="exampleModalLabel">Add to list</h5>
            </div>

            <div class="modal-body">
                <select id="level" class="select form-control">
                    <option disabled selected value="no-level">Choose level</option>
                    <option value="Elementary">Elementary</option>
                    <option value="Secondary">Secondary</option>
                    <option value="Vocational / Trade Course">Vocational / Trade Course</option>
                    <option value="College">College</option>
                    <option value="Graduate Studies">Graduate Studies</option>
                </select>

                <div class="form-outline my-2">
                    <input type="text" id="new-educ-school-name" class="form-control form-control-lg" required>
                    <label class="form-label" for="new-educ-school-name" style="margin-left: 0px;">School Name</label>
                </div>

                <div class="form-outline my-2">
                    <input type="text" id="new-educ-degree" class="form-control form-control-lg" required>
                    <label class="form-label" for="new-educ-degree" style="margin-left: 0px;">Basic Education/Degree/Course</label>
                </div>

                <p class="small pt-2">Period of Attendance</p>

                <select id="new-period-educ-from" class="select form-control" data-mdb-filter="true" data-mdb-container="#newEduc">
                    <option disabled selected value="no-period-from">From</option>

                    @for ($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <div class="my-2"></div>

                <select id="new-period-educ-to" class="select form-control" data-mdb-filter="true" data-mdb-container="#newEduc">
                    <option disabled selected value="no-period-to">To</option>

                    @for ($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <div class="form-outline my-2">
                    <input type="text" id="new-educ-units" class="form-control form-control-lg">
                    <label class="form-label" for="new-educ-units" style="margin-left: 0px;">Highest Level/ Units Earned</label>
                </div>

                <select id="new-educ-year-graduated" class="select form-control" data-mdb-filter="true" data-mdb-container="#newEduc">
                    <option disabled selected value="N/A">Year Graduated</option>

                    @for ($i = date('Y'); $i >= 1950; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <div class="form-outline mt-2">
                    <input type="text" id="new-educ-awards" class="form-control form-control-lg">
                    <label class="form-label" for="new-educ-awards" style="margin-left: 0px;">Scholarship / Academic Award received</label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">cancel</button>
                <button type="button" class="btn btn-primary" id="saveEduc">Save</button>
            </div>
        </div>
    </div>
</div>
