<div class="modal fade" id="lc_{{ $lc->id }}" tabindex="-1" aria-labelledby="new-leave-card" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="new-leave-card">Add to list</h5>
            </div>

            <div class="modal-body" style="max-height: 400px; overflow-y: auto">
                <form action="/welcome/hr/employee/all/info/{{ $employee->id }}/editLeaveCard/{{ $lc->id }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-outline mb-2">
                        <input type="date" id="fromDate" value="{{ $lc->periodFrom }}" class="form-control form-control-lg active" name="fromDate" required>
                        <label class="form-label active" for="fromDate" style="margin-left: 0px;">Period Date - From <small class="text-muted">(required)</small></label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="date" id="toDate" value="{{ $lc->periodTo }}" class="form-control form-control-lg active" name="toDate">
                        <label class="form-label active" for="toDate" style="margin-left: 0px;">Period Date - To</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="text" id="particulars" value="{{ $lc->particulars }}" required class="form-control form-control-lg" name="particulars">
                        <label class="form-label" for="particulars" style="margin-left: 0px;">Particulars</label>
                    </div>

                    <p class="small">** Vacation Leave **</p>

                    <div class="form-outline mb-2">
                        <input type="number" id="vearned" value="{{ $lc->vacEarned }}" class="form-control form-control-lg" name="vearned">
                        <label class="form-label" for="vearned" style="margin-left: 0px;">Earned</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="number" id="vabsund" value="{{ $lc->vacAbsUnd }}" class="form-control form-control-lg" name="vabsund">
                        <label class="form-label" for="vabsund" style="margin-left: 0px;">Abs. Und</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="number" id="vbalance" value="{{ $lc->vacBal }}" class="form-control form-control-lg" name="vbalance">
                        <label class="form-label" for="vbalance" style="margin-left: 0px;">Balance</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="number" id="vwp" value="{{ $lc->vacWP}}" class="form-control form-control-lg" name="vwp">
                        <label class="form-label" for="vwp" style="margin-left: 0px;">W/P</label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="number" id="vtotal" value="{{ $lc->vacTotal }}" class="form-control form-control-lg" name="vtotal">
                        <label class="form-label" for="vtotal" style="margin-left: 0px;">Total</label>
                    </div>

                    <p class="small">** Sick Leave **</p>

                    <div class="form-outline mb-2">
                        <input type="number" id="searned" value="{{ $lc->sickEarned }}" class="form-control form-control-lg" name="searned">
                        <label class="form-label" for="searned" style="margin-left: 0px;">Earned</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="number" id="sabsund" value="{{ $lc->sickAbsUnd }}" class="form-control form-control-lg" name="sabsund">
                        <label class="form-label" for="sabsund" style="margin-left: 0px;">Abs. Und</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="number" id="sbalance" value="{{ $lc->sickBal }}" class="form-control form-control-lg" name="sbalance">
                        <label class="form-label" for="sbalance" style="margin-left: 0px;">Balance</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="number" id="swp" value="{{ $lc->sickWP }}" class="form-control form-control-lg" name="swp">
                        <label class="form-label" for="swp" style="margin-left: 0px;">W/P</label>
                    </div>

                    <div class="form-outline mb-2">
                        <input type="number" id="stotal" value="{{ $lc->sickTotal }}" class="form-control form-control-lg" name="stotal">
                        <label class="form-label" for="stotal" style="margin-left: 0px;">Total</label>
                    </div>

                    <div class="form-outline">
                        <input type="text" id="dateaction" value="{{ $lc->dateAction }}" name="dateaction" class="form-control form-control-lg" required>
                        <label class="form-label" for="dateaction" style="margin-left: 0px;">Date & Action Taken</label>
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
