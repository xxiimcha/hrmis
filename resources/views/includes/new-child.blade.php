<div class="modal fade" id="newChild" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="exampleModalLabel">Add to list</h5>
            </div>

            <div class="modal-body">
                <div class="form-outline mb-3">
                    <input type="text" id="new-child-name" class="form-control form-control-lg no_special_char" required>
                    <label class="form-label" for="new-child-name" style="margin-left: 0px;">Name <small class="text-muted">(required)</small></label>
                </div>

                <div class="form-outline">
                    <input type="date" id="new-child-bday" class="form-control form-control-lg active" required>
                    <label class="form-label active" for="new-child-bday" style="margin-left: 0px;">Birthday <small class="text-muted">(required)</small></label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">cancel</button>
                <button type="button" class="btn btn-primary" id="saveChild">Save</button>
            </div>
        </div>
    </div>
</div>
