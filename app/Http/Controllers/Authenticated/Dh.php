<?php

namespace App\Http\Controllers\Authenticated;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeePersonalInformation;
use App\Models\EmployeeTable;
use App\Models\LeaveRequest;
use App\Models\LeaveRequestTrack;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Heads_personal_info;

class Dh extends Controller
{
    public function dashboard(Request $request) {
        // find all employees that are same with our department id
        $employeeCounts = EmployeeTable::where(['department_id' => User::find(auth()->user()->id)->headInfo->department_id])->count();
        $leaveCounts = EmployeeTable::join('leave_requests', 'leave_requests.employee_table_id', '=', 'employee_tables.id')
            ->where([
                'employee_tables.department_id' => User::find(auth()->user()->id)->headInfo->department_id,
            ])->count();

        return view('department-head.dashboard', [ 'employee' => $employeeCounts, 'leaveRequest' => $leaveCounts ]);
    }

    public function employee(Request $request) {
        // current department head department ID
        $userDeptId = User::find(auth()->user()->id)->headInfo->department_id;

        // get all employees from your department
        $departmentEmployees = EmployeeTable::where('employee_tables.department_id', $userDeptId)->get();

        return view('department-head.employee', [ 'employees' => $departmentEmployees ]);
    }

    public function employeeProfile(Request $request, string $employeeNo) {
        // current department head department ID
        $userDeptId = User::find(auth()->user()->id)->headInfo->department_id;

        // try {
            $employee = EmployeeTable::find($employeeNo);
            $department = DB::table('departments')->get();

            return view('department-head.employee-profile', [ 'employee' => $employee, 'department' => $department ]);
        // } catch (\Exception $th) {
        //     return redirect()->back()->withErrors('Invalid action. Reason: ' . $th->getMessage());
        // }
    }

    public function leaveRequestReceived(Request $request) {
        $allReceivedRequest = EmployeeTable::join('employee_personal_information', 'employee_tables.employee_personal_information_id', '=', 'employee_personal_information.id')
            ->join('leave_requests', 'leave_requests.employee_table_id', '=', 'employee_tables.id')
            ->where([
                'employee_tables.department_id' => User::find(auth()->user()->id)->headInfo->department_id,
                'leave_requests.receiverHead' => 4,
                'leave_requests.status' => (string) "Pending"
            ])->get();

        return view('department-head.received-request', [ 'receivedRequests' => $allReceivedRequest ]);
    }

    public function leaveRequestManaged(Request $request) {
        $allManagedRequests = EmployeeTable::join('departments', 'employee_tables.department_id', '=', 'departments.id')
            ->join('employee_personal_information', 'employee_tables.employee_personal_information_id', '=', 'employee_personal_information.id')
            ->join('leave_requests', 'employee_tables.id', '=', 'leave_requests.employee_table_id')
            ->where([
                'employee_tables.department_id' => User::find(auth()->user()->id)->headInfo->department_id
            ])->where('leave_requests.receiverHead', '=', 1)
            ->orWhere('leave_requests.receiverHead', '=', 4)
            ->where('leave_requests.status', '!=', 'Pending')
            ->get();

            // dd($allManagedRequests);

        return view('department-head.managed-request', [ 'managedRequests' => $allManagedRequests ]);
    }

    public function approvalOrDis(Request $request, string $type, string $lrId) {
        $currentDH = auth()->user()->headInfo->first();

        if($type == 'approved'){
            LeaveRequest::find($lrId)->update([
                'receiverHead' => 1,
                'status' => 'Approved'
            ]);

            $ltr = new LeaveRequestTrack;
            $ltr->leave_request_id = $lrId;
            $ltr->user_id = auth()->user()->id;
            $ltr->trackStatus = 'Approved';
            $ltr->message = "Your leave request has been successfully approved by the Department head";
            $ltr->save();
        } else {
            $message = $request->message;
            LeaveRequest::where('id', $lrId)->update([
                'disapprovedMessage' => $message ?? 'Your leave request has been disapproved.',
                'status' => 'Rejected'
            ]);

            $ltr = new LeaveRequestTrack;
            $ltr->leave_request_id = $lrId;
            $ltr->user_id = auth()->user()->id;
            $ltr->trackStatus = 'Rejected';
            $ltr->message = "Unfortunately, your leave request has not been approved by the Department head";
            $ltr->save();
        }

        return redirect()->back()->withErrors('message', '<strong>Well done!</strong> The request has been updated')->withInput();
    }

    public function account(Request $request) {
        if($request->method() == "POST"){
            if($request->basic){
                $validation_patterns = [
                    'firstname'     => 'required|regex:/^[a-zA-Z\s]+$/u',
                    'middlename'    => 'required|regex:/^[a-zA-Z\s]+$/u',
                    'lastname'      => 'required|regex:/^[a-zA-Z\s]+$/u',
                    'email'         => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::user()->id)],
                ];

                $validator = \Validator::make($request->all(), $validation_patterns);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                } else {
                    User::find(auth()->user()->id)->update([ 'email' => $request->email ]);

                    Heads_personal_info::where('user_id', auth()->user()->id)->update([
                        'firstname'  => $request->firstname,
                        'middlename' => $request->middlename,
                        'lastname'   => $request->lastname
                    ]);

                    return redirect()->back()->with('message', '<strong>Success!</strong> Your account settings has been updated');
                }
            }

            if($request->forpass){
                $validation_patterns = [
                    'currentPassword' => [ 'required' ],
                    'newPassword' => ['min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/', 'required' ],
                    'confirmPassword' => ['required', 'same:newPassword' ]
                ];

                $validator = \Validator::make($request->all(), $validation_patterns);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                } else {
                    if(Hash::check($request->currentPassword, auth()->user()->password)){
                        User::find(auth()->user()->id)->update([ 'password' => $request->newPassword ]);
                        return redirect()->back()->with('message', '<strong>Success!</strong> Your account settings has been updated');
                    } else {
                        return redirect()->back()->withErrors('<strong>Oops!</strong> Current password not match.');
                    }
                }
            }

            if($request->forimage){
                $validation_patterns = [
                    'image_data' => [ 'required' ],
                ];

                $validator = \Validator::make($request->all(), $validation_patterns);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                } else {
                    $image_name = Str::uuid() . '.png';
                    Image::make(file_get_contents($request->image_data))->save(public_path() . '/user-images/' . $image_name);

                    Heads_personal_info::where('user_id', auth()->user()->id)->update([ 'avatar' => $image_name ]);
                    return redirect()->back()->with('message', '<strong>Success!</strong> Your account settings has been updated');
                }
            }
        }

        return view('department-head.account-settings');
    }
}
