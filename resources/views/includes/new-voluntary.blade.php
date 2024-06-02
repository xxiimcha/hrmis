<div class="modal fade" id="newVoluntary" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="exampleModalLabel">Add to list</h5>
            </div>

            <div class="modal-body">
                <div class="form-outline mb-2">
                    <input type="text" id="new-vol-organization" class="form-control form-control-lg">
                    <label class="form-label" for="new-vol-organization" style="margin-left: 0px;">Name & Address of organization</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="date" id="new-vol-inc-from" class="form-control form-control-lg active">
                    <label class="form-label active" for="new-vol-inc-from" style="margin-left: 0px;">Inclusive Dates - From</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="date" id="new-vol-inc-to" class="form-control form-control-lg active">
                    <label class="form-label active" for="new-vol-inc-to" style="margin-left: 0px;">Inclusive Dates - To</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="number" id="new-vol-hours" class="form-control form-control-lg">
                    <label class="form-label" for="new-vol-hours" style="margin-left: 0px;">Number of Hours</label>
                </div>

                <div class="form-outline mb-2">
                    <input type="text" id="new-vol-position" class="form-control form-control-lg">
                    <label class="form-label" for="new-vol-position" style="margin-left: 0px;">Position / Nature of work</label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">cancel</button>
                <button type="button" class="btn btn-primary" id="saveVoluntary">Save</button>
            </div>
        </div>
    </div>
</div>
