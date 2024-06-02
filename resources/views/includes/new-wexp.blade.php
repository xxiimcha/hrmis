<div class="modal fade" id="newWExp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="exampleModalLabel">Add to list</h5>
            </div>

            <div class="modal-body">
                <div class="form-outline mb-2">
                    <input type="date" id="new-wexp-inc-from" class="form-control form-control-lg active">
                    <label class="form-label active" for="new-wexp-inc-from" style="margin-left: 0px;">Inclusive Dates - From</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="date" id="new-wexp-inc-to" class="form-control form-control-lg active">
                    <label class="form-label active" for="new-wexp-inc-to" style="margin-left: 0px;">Inclusive Dates - To</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="text" id="new-wexp-position" class="form-control form-control-lg" required>
                    <label class="form-label" for="new-wexp-position" style="margin-left: 0px;">Position Title</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="text" id="new-wexp-department" class="form-control form-control-lg">
                    <label class="form-label" for="new-wexp-department" style="margin-left: 0px;">Department/Agency/Office/Company</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="number" id="new-wexp-salary" class="form-control form-control-lg">
                    <label class="form-label" for="new-wexp-salary" style="margin-left: 0px;">Monthly Salary</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="text" id="new-wexp-increment" class="form-control form-control-lg">
                    <label class="form-label" for="new-wexp-increment" style="margin-left: 0px;">Salary/Job/Pay Grade & Step Increment</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="text" id="new-wexp-status" class="form-control form-control-lg">
                    <label class="form-label" for="new-wexp-status" style="margin-left: 0px;">Status of Appointment</label>
                </div>

                <select id="new-wexp-govt-service" class="form-control select">
                    <option value="NO" disabled selected>Gov't Service</option>
                    <option value="YES">Yes</option>
                    <option value="NO">No</option>
                </select>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">cancel</button>
                <button type="button" class="btn btn-primary" id="saveWExp">Save</button>
            </div>
        </div>
    </div>
</div>
