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

                    <input type="hidden" value="{{ $n->id }}" name="stepId">
                    <input type="hidden" value="{{ $n->employee_table_id }}" name="employeeTableId">

                    <div class="form-outline mb-2">
                        <input type="text" name="position" required value="{{ $n->employeeTinfo->position }}" id="new-ref-name" class="form-control form-control-lg">
                        <label class="form-label" for="new-ref-name" style="margin-left: 0px;">Position</label>
                    </div>

                    <p class="small mt-2">** Salary Adjustments **</p>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-outline mb-2">
                                <label class="form-label" for="merit" style="margin-left: 0px;">Merit</label>
                                <p id="merit_{{ $n->id }}" class="form-control-plaintext"></p>
                                <input type="hidden" id="meritValue_{{ $n->id }}" name="meritValue">
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-outline mb-2">
                                <label class="form-label" for="lengthOfService" style="margin-left: 0px;">Length of Service</label>
                                <p id="lengthOfService_{{ $n->id }}" class="form-control-plaintext"></p>
                                <input type="hidden" id="lengthOfServiceValue_{{ $n->id }}" name="lengthOfServiceValue">
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bluish_button" data-mdb-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="saveReference">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#stepUpdate_{{ $n->id }}').on('show.bs.modal', function () {
            // Calculate the number of 3-year periods
            var enteredDate = new Date('{{ $n->employeeTinfo->entered_date }}');
            var currentDate = new Date();
            var yearsOfService = Math.floor((currentDate - enteredDate) / (1000 * 60 * 60 * 24 * 365));
            var periods = Math.floor(yearsOfService / 3);

            // Ensure the merit value doesn't exceed 8
            var merit = periods > 8 ? 8 : periods;

            // Set the merit and length of service values
            document.getElementById('merit_{{ $n->id }}').innerText = merit;
            document.getElementById('meritValue_{{ $n->id }}').value = merit * 1000; // Example calculation
            document.getElementById('lengthOfService_{{ $n->id }}').innerText = yearsOfService;
            document.getElementById('lengthOfServiceValue_{{ $n->id }}').value = yearsOfService * 100; // Example calculation
        });

        document.getElementById("saveReference").addEventListener("click", function () {
            // Close the modal when the "Save" button is clicked
            $("#stepUpdate_{{ $n->id }}").modal("hide");
        });
    });
</script>
