<?php

namespace App\Http\Controllers\Authenticated;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\EmployeeTable;
use App\Models\LeaveRequest;
use App\Models\LeaveRequestTrack;

class Em extends Controller
{
    public function dashboard(Request $request) {
        $i = EmployeeTable::where('user_id', auth()->user()->id)->first();

        $leaveRequests = LeaveRequest::where('employee_table_id', $i->id)->count();

        $leaveCredits = $i->leaveCredits;
        $vacationLeave = $i->vacationLeave;
        $sickLeave = $i->sickLeave;

        return view('employee.dashboard', [
            'leaveCount' => $leaveRequests,
            'leaveCredits' => $leaveCredits,
            'vacationLeave' => $vacationLeave,
            'sickLeave' => $sickLeave,
        ]);
    }

    public function newLeaveRequest(Request $request) {
        $myInfo = EmployeeTable::where('user_id', Auth::user()->id)->first();
        $currentSalary = EmployeeTable::join('employee_service_records', 'employee_tables.id', '=', 'employee_service_records.employee_table_id')->orderBy('employee_service_records.created_at', 'DESC')->first();

        if($request->method() == "POST") {
            $validation_patterns = [
                'numberofdays6C' => 'required',
                'inclusivedates6C' => 'required',
            ];

            if(isset($request->leaveDetails) && in_array($request->leaveDetails, [1, 2, 3, 4, 9])) {
                $validation_patterns['details6B'] = 'required';
            }

            $validator = \Validator::make($request->all(), $validation_patterns);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $lr = new LeaveRequest;
                $lr->employee_table_id = $myInfo->id;
                $lr->department_id = $myInfo->employeeDepartment->id;
                $lr->dateoffiling = date('m-d-Y');
                $lr->disapprovedMessage = '';
                $lr->recommendation7B = '';
                $lr->recommendation7BReason = '';
                $lr->dayswpay = '';
                $lr->dayswopay = '';
                $lr->others = '';
                $lr->position = $myInfo->position;
                $lr->salary = $currentSalary->salary . ' per ' . $currentSalary->mode;
                $lr->typeofleave6A = $request->selectedLeaveType;
                $lr->othersOf6A = $request->others6A ?? '';
                $lr->detailsOfLeave6B = $request->selectedLeaveDetails ?? '';
                $lr->detailsOfLeave6BReason = $request->details6B ?? '';
                $lr->numberOfWorkingDays6C = $request->numberofdays6C ?? '';
                $lr->inclusiveDates6C = $request->inclusivedates6C ?? '';
                $lr->commutation6D = $request->commutation;
                $lr->save();
                $lrId = $lr->id;

                $ltr = new LeaveRequestTrack;
                $ltr->user_id = auth()->user()->id;
                $ltr->leave_request_id = $lrId;
                $ltr->trackStatus = 'Pending';
                $ltr->message = "Your leave request has been submitted and is pending approval.";
                $ltr->save();

                return redirect()->back()->with('message', '<strong>Well done!</strong> Your request has been sent to your department head');
            }
        }

        return view('employee.new-request', [ 'myInfo' => $myInfo, 'currentSalary' => $currentSalary ]);
    }

    public function leaveRequests(Request $request) {
        $i = EmployeeTable::where('user_id', auth()->user()->id)->first();
        $leaveRequest = LeaveRequest::where('employee_table_id', $i->id)->get();

        return view('employee.leave', [ 'leaveRequests' => $leaveRequest ]);
    }

    public function removeRequest(Request $request, string $rId) {
        LeaveRequestTrack::where('leave_request_id', $rId)->delete();
        LeaveRequest::where('id', $rId)->delete();

        return redirect()->back()->with('message', '<strong>Well done!</strong> Your request has been deleted');
    }

    public function profile(Request $request) {
        $employee = EmployeeTable::where('user_id', Auth::id())->first();
        $department = DB::table('departments')->get();

        return view('employee.profile', [ 'employee' => $employee, 'departments' => $department ]);
    }
}
