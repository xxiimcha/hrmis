<div class="modal fade" id="newLeaveBalance" tabindex="-1" aria-labelledby="newLeaveBalanceLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newLeaveBalanceLabel">Update Leave Credits</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateLeaveCreditsForm">
                    @csrf
                    <input type="hidden" name="emp_id" value="{{ $employee->id }}">

                    <!-- Combobox for selecting leave type -->
                    <div class="mb-3">
                        <label for="leaveType" class="form-label">Leave Type</label>
                        <select class="form-select" id="leaveType" name="leave_type">
                            <option value="mandatoryLeave">Mandatory Leave</option>
                            <option value="maternityLeave">Maternity Leave</option>
                            <option value="paternityLeave">Paternity Leave</option>
                            <option value="specialPrivilegeLeave">Special Privilege Leave</option>
                            <option value="soloParentLeave">Solo Parent Leave</option>
                            <option value="studyLeave">Study Leave</option>
                            <option value="rehabilitationLeave">Rehabilitation Leave</option>
                            <option value="specialLeaveForWomen">Special Leave For Women</option>
                            <option value="specialEmergencyLeave">Special Emergency Leave</option>
                            <option value="adoptionLeave">Adoption Leave</option>
                            <!-- Add other leave types as needed, excluding vacation and sick leave -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="leaveCreditsInput" class="form-label">New Leave Credits</label>
                        <input type="number" class="form-control" id="leaveCreditsInput" name="count">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
