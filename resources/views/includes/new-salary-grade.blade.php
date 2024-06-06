<div class="modal fade" id="newSalaryGrade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title small" id="exampleModalLabel">Add to list</h5>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('salary-grades.new') }}">
                    @csrf
                    <input type="hidden" name="emp_id" value="{{ $employee->id }}">
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="mb-3">
                            <label for="step_{{ $i }}" class="form-label">Step {{ $i }}</label>
                            <input type="number" step="0.01" class="form-control" id="step_{{ $i }}" name="step_{{ $i }}">
                        </div>
                    @endfor
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
