<div class="modal fade" id="stepUpdate_{{ $n->id }}" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="step-increment-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="step-increment-modal">Step Increment Update</h5>
            </div>

            <div class="modal-body">
                <form method="POST">
                    {{ csrf_field() }}

                    <p class="small">Basic Monthly Salary: ₱{{ $n->employeeTinfo->current_salary * 22 }}</p>

                    <input type="text" value="{{ $n->id }}" name="stepId" class="sr-only">
                    <input type="text" value="{{ $n->employee_table_id }}" name="employeeTableId" class="sr-only">

                    <div class="form-outline mb-2">
                        <input type="text" name="position" required value="{{ $n->employeeTinfo->position }}" id="new-ref-name" class="form-control form-control-lg">
                        <label class="form-label" for="new-ref-name" style="margin-left: 0px;">Position</label>
                    </div>

                    <p class="small mt-2">** Salary Adjustments **</p>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-outline mb-2">
                                <input type="text" id="merit" class="form-control form-control-lg" name="merit">
                                <label class="form-label" for="merit" style="margin-left: 0px;">Merit</label>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-outline mb-2">
                                <input type="number" id="meritValue" class="form-control form-control-lg" name="meritValue">
                                <label class="form-label" for="meritValue" style="margin-left: 0px;">Value</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-outline mb-2">
                                <input type="text" id="lengthOfService" class="form-control form-control-lg" required name="lengthOfService">
                                <label class="form-label" for="lengthOfService" style="margin-left: 0px;">Length of Service</label>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-outline mb-2">
                                <input type="number" id="lengthOfServiceValue" class="form-control form-control-lg" required name="lengthOfServiceValue">
                                <label class="form-label" for="lengthOfServiceValue" style="margin-left: 0px;">Value</label>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">cancel</button>
                <button type="submit" class="btn btn-primary" id="saveReference">Save</button>
            </form>
            </div>
        </div>
    </div>
</div><script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("saveReference").addEventListener("click", function () {
            // Close the modal when the "Save" button is clicked
            $("#stepUpdate_{{ $n->id }}").modal("hide");
        });
    });
</script>

