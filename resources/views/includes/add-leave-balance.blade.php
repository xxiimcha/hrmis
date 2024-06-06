<!-- Leave Credits Modal -->
<div class="modal fade" id="newLeaveBalance" tabindex="-1" aria-labelledby="newLeaveBalance" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newLeaveBalance">Add/Update Leave Credits</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateLeaveCreditsForm">
                    @csrf
                    <input type="hidden" name="emp_id" value="{{ $employee->id }}">
                    <div class="mb-3">
                        <label for="leaveType" class="form-label">Leave Type</label>
                        <select class="form-control" id="leaveType" name="leaveType">
                            <option value="mandatoryLeave">Mandatory/Forced Leave</option>
                            <option value="maternityLeave">Maternity Leave</option>
                            <option value="paternityLeave">Paternity Leave</option>
                            <option value="specialPrivilegeLeave">Special Privilege Leave</option>
                            <option value="soloParentLeave">Solo Parent Leave</option>
                            <option value="studyLeave">Study Leave</option>
                            <option value="vawcLeave">10-Day VAWC Leave</option>
                            <option value="rehabilitationLeave">Rehabilitation Privilege</option>
                            <option value="specialLeaveForWomen">Special Leave Benefits for Women</option>
                            <option value="specialEmergencyLeave">Special Emergency (Calamity) Leave</option>
                            <option value="adoptionLeave">Adoption Leave</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="leaveCreditsInput" class="form-label">New Leave Credits</label>
                        <input type="number" class="form-control" id="leaveCreditsInput" name="leaveCredits">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
