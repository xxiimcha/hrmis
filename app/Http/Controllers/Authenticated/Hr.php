<?php

namespace App\Http\Controllers\Authenticated;

use App\Http\Controllers\Controller;
use App\Mail\NewEmployee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

use App\Models\{
    User,
    LeaveRequest,
    LeaveRequestTrack,
    Department,
    EmployeeTable,
    EmployeePerAdd,
    EmployeeResAdd,
    EmployeePersonalInformation,
    Heads_personal_info,
    LeaveCard,
    EmployeeServiceRecord,
    FamilyBackground,
    SpouseInfo,
    FatherInfo,
    MotherInfo,
    EmployeeChildren,
    EmployeeEducBack,
    EmployeeCivilService,
    EmployeeWorkExp,
    EmployeeVoluntary,
    EmployeeLearning,
    EmployeeHobby,
    EmployeeOtherSkill,
    EmployeeMembership,
    EmployeeReference,
    EmployeeIssuedId,
    StepNotification,
    SalaryGrade
};

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class Hr extends Controller
{
    public function dashboard(Request $request) {
        $employeeCounts = User::where('role', 6)->count();
        $leaveCounts = LeaveRequest::where('receiverHead', '!=', 4)->count();

        $leaveTypes = [
            'Vacation Leave' => LeaveRequest::where('typeOfLeave6A', 1)->count(),
            'Mandatory/Forced Leave' => LeaveRequest::where('typeOfLeave6A', 2)->count(),
            'Sick Leave' => LeaveRequest::where('typeOfLeave6A', 3)->count(),
            'Maternity Leave' => LeaveRequest::where('typeOfLeave6A', 4)->count(),
            'Paternity Leave' => LeaveRequest::where('typeOfLeave6A', 5)->count(),
            'Special Privilege Leave' => LeaveRequest::where('typeOfLeave6A', 6)->count(),
            'Solo Parent Leave' => LeaveRequest::where('typeOfLeave6A', 7)->count(),
            'Study Leave' => LeaveRequest::where('typeOfLeave6A', 8)->count(),
            '10-Day VAWC Leave' => LeaveRequest::where('typeOfLeave6A', 9)->count(),
            'Rehabilitation Privilege' => LeaveRequest::where('typeOfLeave6A', 10)->count(),
            'Special Leave Benefits for Women' => LeaveRequest::where('typeOfLeave6A', 11)->count(),
            'Special Emergency Leave' => LeaveRequest::where('typeOfLeave6A', 12)->count(),
            'Adoption Leave' => LeaveRequest::where('typeOfLeave6A', 13)->count(),
        ];

        return view('hr.dashboard', [
            'employee' => $employeeCounts,
            'leaveCount' => $leaveCounts,
            'leaveTypes' => $leaveTypes
        ]);
    }

    public function departments()
    {
        $departments = Department::all();
        $employeesByDepartment = [];

        foreach ($departments as $department) {
            $employees = DB::table('employee_service_records')
                ->join('employee_personal_information', 'employee_service_records.employee_table_id', '=', 'employee_personal_information.id')
                ->where('employee_service_records.department_id', $department->id)
                ->select('employee_personal_information.*')
                ->get();

            $employeesByDepartment[$department->id] = $employees;
        }

        return view('hr.departments', compact('departments', 'employeesByDepartment'));
    }


    public function leaveRequestReceived(Request $request) {
        $allReceivedRequest = EmployeeTable::join('employee_personal_information', 'employee_tables.employee_personal_information_id', '=', 'employee_personal_information.id')
            ->join('departments', 'employee_tables.department_id', '=', 'departments.id')
            ->join('leave_requests', 'leave_requests.employee_table_id', '=', 'employee_tables.id')
            ->where(
                'leave_requests.receiverHead', 1 // means all approved request from department head will be my received request
            )
            ->where('leave_requests.status', "Pending")->get();

        return view('hr.received-request', [ 'receivedRequests' => $allReceivedRequest ]);
    }

    public function leaveRequestManaged(Request $request) {
        $allManagedRequests = EmployeeTable::join('employee_personal_information', 'employee_tables.employee_personal_information_id', '=', 'employee_personal_information.id')
            ->join('departments', 'employee_tables.department_id', '=', 'departments.id')
            ->join('leave_requests', 'leave_requests.employee_table_id', '=', 'employee_tables.id')
            ->where('leave_requests.receiverHead', 1)
            ->orWhere('leave_requests.receiverHead', 3)
            ->where('leave_requests.status', '!=', 'Pending')->get();

        return view('hr.managed-request', [ 'managedRequests' => $allManagedRequests ]);
    }

    public function approvalOrDis(Request $request, string $type, string $lrId) {
        $currentDH = auth()->user()->headInfo->first();

        if($type == 'approved'){
            LeaveRequest::where('id', $lrId)->update([
                'receiverHead' => 3,
                'status' => 'Approved'
            ]);

            $ltr = new LeaveRequestTrack;
            $ltr->leave_request_id = $lrId;
            $ltr->user_id = auth()->user()->id;
            $ltr->trackStatus = 'Approved';
            $ltr->message = "Your leave request has been successfully approved by the HR";
            $ltr->save();
        } else {
            $message = $request->message;
            LeaveRequest::where('id', $lrId)->update([
                'disapprovedMessage' => $message,
                'status' => 'Rejected'
            ]);

            $ltr = new LeaveRequestTrack;
            $ltr->leave_request_id = $lrId;
            $ltr->user_id = auth()->user()->id;
            $ltr->trackStatus = 'Rejected';
            $ltr->message = "Unfortunately, your leave request has not been approved by the HR";
            $ltr->save();
        }

        return redirect()->back()->withErrors('message', '<strong>Well done!</strong> The request has been updated')->withInput();
    }

    public function new(Request $request){
        $provinces = DB::table('philippine_provinces')->get();
        $department = DB::table('departments')->get();

        if($request->method() == "POST"){
            $validation_patterns = [
                'department' => 'required',
                'position'   => 'required',
                'firstname'  => 'required|regex:/^[a-zA-Z\s]+$/u',
                'middlename' => 'required|regex:/^[a-zA-Z\s]+$/u',
                'lastname'   => 'required|regex:/^[a-zA-Z\s]+$/u',
                'employee_number' => 'required|unique:employee_personal_information',
                'fromDate' => 'required',
                'status' => 'required',
                'salary' => 'required',
                'salaryMode' => 'required',
                'branch' => 'required',
                'remarks' => 'required'
            ];

            if($request->email){
                $validation_patterns['email'] = 'email|unique:users';
            }

            $validator = \Validator::make($request->all(), $validation_patterns);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $newEmployeeAsAuth0 = new User;
                $employee       = new EmployeeTable;
                $employeeResAdd = new EmployeeResAdd;
                $employeePerAdd = new EmployeePerAdd;
                $employeePerInfo = new EmployeePersonalInformation;
                $newsr = new EmployeeServiceRecord;
                $family = new FamilyBackground;
                $spouse = new SpouseInfo;
                $father = new FatherInfo;
                $mother = new MotherInfo;
                $issuedId = new EmployeeIssuedId;

                $up = uniqid();
                $customEmail = $request->email ?? $up . '@hrmis.com';

                // save the residential address
                $employeeResAdd->block     = $request->res_block ?? '';
                $employeeResAdd->street    = $request->res_street ?? '';
                $employeeResAdd->village   = $request->res_village ?? '';
                $employeeResAdd->province  = $request->raprov ?? '';
                $employeeResAdd->city      = $request->racm ?? '';
                $employeeResAdd->baranggay = $request->rab ?? '';
                $employeeResAdd->zipcode   = $request->res_zipcode ?? '';
                $employeeResAdd->save();
                $employeeResAddId = $employeeResAdd->id;

                // save the permanent address
                $employeePerAdd->block     = $request->perm_house ?? '';
                $employeePerAdd->street    = $request->perm_street ?? '';
                $employeePerAdd->village   = $request->perm_village ?? '';
                $employeePerAdd->province  = $request->paprov ?? '';
                $employeePerAdd->city      = $request->pacm ?? '';
                $employeePerAdd->baranggay = $request->pab ?? '';
                $employeePerAdd->zipcode   = $request->perm_zipcode ?? '';
                $employeePerAdd->save();
                $employeePerAddId = $employeePerAdd->id;

                // save the personal information ( PART 1 )
                $employeePerInfo->firstname     = $request->firstname;
                $employeePerInfo->middlename    = $request->middlename;
                $employeePerInfo->lastname      = $request->lastname;
                $employeePerInfo->extension     = $request->pe_extension ?? '';
                $employeePerInfo->birthday      = $request->pe_birthday;
                $employeePerInfo->birthPlace    = $request->pe_placeofbirth;
                $employeePerInfo->sex           = $request->pe_sex ?? '';
                $employeePerInfo->civilStatus   = $request->pe_civilstatus ?? '';
                $employeePerInfo->height        = $request->pe_height;
                $employeePerInfo->weight        = $request->pe_weight;
                $employeePerInfo->bloodType     = $request->pe_bloodtype ?? '';
                $employeePerInfo->gsis          = $request->pe_gsis;
                $employeePerInfo->pagibig       = $request->pe_pagibig;
                $employeePerInfo->philhealth    = $request->pe_philhealth;
                $employeePerInfo->sss           = $request->pe_sss;
                $employeePerInfo->tin           = $request->pe_tin;
                $employeePerInfo->employee_number   = $request->employee_number;
                $employeePerInfo->citizenship       = $request->pe_citizenship;
                $employeePerInfo->telephone = $request->pa_telephone;
                $employeePerInfo->mobile    = $request->pa_mobile;
                $employeePerInfo->email     = $customEmail;
                $employeePerInfo->employee_per_add_id   = $employeePerAddId;
                $employeePerInfo->employee_res_add_id   = $employeeResAddId;
                $employeePerInfo->save();
                $newEmployeePerInfoId = $employeePerInfo->id;

                // issued id
                $issuedId->issuedId = $request->gid;
                $issuedId->licenseNo = $request->gnumber;
                $issuedId->issuancePlace = $request->gissuance;
                $issuedId->save();

                // save this employee
                $employee->department_id = $request->department;
                $employee->position      = $request->position;
                $employee->employee_personal_information_id = $newEmployeePerInfoId;
                $employee->employee_issued_id_id = $newEmployeePerInfoId;
                $employee->entered_date = $request->fromDate;
                $employee->current_salary = $request->salary;
                $employee->current_salary_mode = $request->salaryMode;

                $employee->save();
                $employeeId = $employee->id;

                // create auth for employee
                $newEmployeeAsAuth0->email     = $customEmail;
                $newEmployeeAsAuth0->password  = $up;
                $newEmployeeAsAuth0->role = 6;
                $newEmployeeAsAuth0->save();
                $userId = $newEmployeeAsAuth0->id;

                // create connection from auth table to employee table
                DB::table('employee_tables')->where('id', $employeeId)->update([
                    'user_id' => $userId
                ]);

                // service record
                $newsr->employee_table_id = $employeeId;
                $newsr->fromDate = $request->fromDate;
                $newsr->toDate = $request->toDate ?? '';
                $newsr->designation = $request->position;
                $newsr->status = $request->status;
                $newsr->salary = $request->salary;
                $newsr->mode = $request->salaryMode;
                $newsr->department_id = $request->department;
                $newsr->branch = $request->branch;
                $newsr->leaves = 'None';
                $newsr->remarks = $request->remarks;
                $newsr->save();

                // spouse info
                $spouse->firstname = $request->spouseFirstname ?? null;
                $spouse->middlename = $request->spouseMiddlename ?? null;
                $spouse->lastname = $request->spouseLastname ?? null;
                $spouse->extension = $request->spouseExtension ?? null;
                $spouse->occupation = $request->spouseOccupation ?? null;
                $spouse->employer = $request->spouseEmployer ?? null;
                $spouse->busAdd = $request->spouseBusinessAddress ?? null;
                $spouse->telephone = $request->spouseTelephone ?? null;
                $spouse->save();
                $spouse_id = $spouse->id;

                // father info
                $father->firstname = $request->fatherFirstname ?? null;
                $father->middlename = $request->fatherMiddlename ?? null;
                $father->lastname = $request->fatherLastname ?? null;
                $father->extension = $request->fatherExtension ?? null;
                $father->save();
                $father_id = $father->id;

                // mother info
                $mother->firstname = $request->motherFirstname ?? null;
                $mother->middlename = $request->motherMiddlename ?? null;
                $mother->lastname = $request->motherLastname ?? null;
                $mother->maiden = null; // REMOVE !!
                $mother->save();
                $mother_id = $mother->id;

                // family background
                $family->employee_table_id = $employeeId;
                $family->spouse_info_id = $spouse_id;
                $family->father_info_id = $father_id;
                $family->mother_info_id = $mother_id;
                $family->save();
                $family_background_id = $family->id;

                if($request->childName){
                    // employee children
                    for($i = 0; $i < count($request->childName); $i++){
                        $children = new EmployeeChildren;
                        $children->family_background_id = $family_id;
                        $children->name = $request->childName[$i] ?? null;
                        $children->birthday = $request->childBday[$i] ?? null;
                        $children->save();
                    }
                }

                if($request->educSchoolName){
                    // educational background
                    for($i = 0; $i < count($request->educSchoolName); $i++){
                        $educBack = new EmployeeEducBack;
                        $educBack->employee_table_id = $employeeId;
                        $educBack->level = $request->educLevel[$i] ?? null;
                        $educBack->school_name = $request->educSchoolName[$i] ?? null;
                        $educBack->degree = $request->educDegree[$i] ?? null;
                        $educBack->fromAtt = $request->educPeriodFrom[$i] ?? null;
                        $educBack->toAtt = $request->educPeriodTo[$i] ?? null;
                        $educBack->highLevel = $request->educUnits[$i] ?? null;
                        $educBack->yearGrad = $request->educYearGraduated[$i] ?? null;
                        $educBack->scholarship = $request->educAwards[$i] ?? null;
                        $educBack->save();
                    }
                }

                if($request->csCareer){
                    // civil service
                    for($i = 0; $i < count($request->csCareer); $i++){
                        $civil = new EmployeeCivilService;
                        $civil->employee_table_id = $employeeId;
                        $civil->career = $request->csCareer[$i] ?? null;
                        $civil->rating = $request->csRating[$i] ?? null;
                        $civil->conferment = $request->csDateExamConf[$i] ?? null;
                        $civil->conferPlace = $request->csPlaceExamConf[$i] ?? null;
                        $civil->licenseNo = $request->csLicenseNo[$i] ?? null;
                        $civil->licenseDVal = $request->csLicenseDate[$i] ?? null;
                        $civil->save();
                    }
                }

                if($request->wexpPosition){
                    // work experience
                    for($i = 0; $i < count($request->wexpPosition); $i++){
                        $work = new EmployeeWorkExp;
                        $work->employee_table_id = $employeeId;
                        $work->incFrom = $request->wexpIncFrom[$i] ?? 'Present';
                        $work->incTo = $request->wexpIncTo[$i] ?? null;
                        $work->position = $request->wexpPosition[$i] ?? null;
                        $work->company = $request->wexpDepartment[$i] ?? null;
                        $work->monthlySalary = $request->wexpSalary[$i] ?? null;
                        $work->stepInc = $request->wexpIncrement[$i] ?? null;
                        $work->appointmentStat = $request->wexpStatus[$i] ?? null;
                        $work->govt = $request->wexpIsGovt[$i] ?? null;
                        $work->save();
                    }
                }

                if($request->volOrganizationAddress){
                    // voluntary
                    for($i = 0; $i < count($request->volOrganizationAddress); $i++){
                        $vol = new EmployeeVoluntary;
                        $vol->employee_table_id = $employeeId;
                        $vol->organization = $request->volOrganizationAddress[$i] ?? null;
                        $vol->incFrom = $request->volIncFrom[$i] ?? null;
                        $vol->incTo = $request->volIncTo[$i] ?? null;
                        $vol->noHours = $request->volHours[$i] ?? null;
                        $vol->position = $request->volPosition[$i] ?? null;
                        $vol->save();
                    }
                }

                if($request->learningOrganizationAddress){
                    // learning
                    for($i = 0; $i < count($request->learningOrganizationAddress); $i++){
                        $learning = new EmployeeLearning;
                        $learning->employee_table_id = $employeeId;
                        $learning->learningTitle = $request->learningOrganizationAddress[$i] ?? null;
                        $learning->atFrom = $request->learningIncFrom[$i] ?? null;
                        $learning->atTo = $request->learningIncTo[$i] ?? null;
                        $learning->noHours = $request->learningHours[$i] ?? null;
                        $learning->ld = $request->learningLd[$i] ?? null;
                        $learning->conducted = $request->learningSponsored[$i] ?? null;
                        $learning->save();
                    }
                }

                if($request->skills){
                    // hobbies
                    for($i = 0; $i < count($request->skills); $i++){
                        $hobby = new EmployeeHobby;
                        $hobby->employee_table_id = $employeeId;
                        $hobby->hobby = $request->skills[$i] ?? null;
                        $hobby->save();
                    }
                }

                if($request->academic){
                    // other skills
                    for($i = 0; $i < count($request->academic); $i++){
                        $academic = new EmployeeOtherSkill;
                        $academic->employee_table_id = $employeeId;
                        $academic->recognition = $request->academic[$i] ?? null;
                        $academic->save();
                    }
                }

                if($request->membership){
                    // membership
                    for($i = 0; $i < count($request->membership); $i++){
                        $membership = new EmployeeMembership;
                        $membership->employee_table_id = $employeeId;
                        $membership->membership = $request->membership[$i] ?? null;
                        $membership->save();
                    }
                }

                if($request->refName){
                    // reference
                    for($i = 0; $i < count($request->refName); $i++){
                        $reference = new EmployeeReference;
                        $reference->employee_table_id = $employeeId;
                        $reference->name = $request->refName[$i] ?? null;
                        $reference->address = $request->refAddress[$i] ?? null;
                        $reference->telephone = $request->refTelephone[$i] ?? null;
                        $reference->save();
                    }
                }


                \Mail::to($customEmail)->send(new NewEmployee(['password' => $up]));

                return redirect()->back()->with('message', '<strong>Success!</strong> Employee has been saved');
            }
        }

        return view('hr.new-employee', [ 'provinces' => $provinces, 'departments' => $department ]);
    }

    public function getAllEmployee(Request $request){
        $allEmployee = User::where('role', 6)->get();

        if($request->method() == "GET" && $request->search){
            $searchString = $request->search;

            $allEmployee = DB::table("users")
            ->join("employee_tables", function($join){ $join->on("users.id", "=", "employee_tables.user_id"); })
            ->join("employee_personal_information", function($join){ $join->on("employee_tables.employee_personal_information_id", "=", "employee_personal_information.id"); })
            ->join("departments", function($join){ $join->on("employee_personal_information.department_id", "=", "departments.id"); })
            ->where("employee_personal_information.employee_number", "LIKE", "%$searchString%")
            ->orWhere("employee_personal_information.firstname", "LIKE", "%$searchString%")
            ->orWhere("employee_personal_information.middlename", "LIKE", "%$searchString%")
            ->orWhere("employee_personal_information.lastname", "LIKE", "%$searchString%")
            ->orWhere("departments.name", "LIKE", "%$searchString%")
            ->where("users.role", "=", 6)->get();
        }

        return view('hr.employee', [ 'employees' => $allEmployee ]);
    }

    public function getNewAddress(Request $request){
        if($request->from == 'province'){
            $municipalities = DB::table('philippine_cities')->where('province_code', $request->value)->get();

            echo "<option disabled selected>City / Municipality</option>";
            foreach($municipalities as $mun){
                echo "<option value='" . $mun->city_municipality_code . "'>". $mun->city_municipality_description ."</option>";
            }
        } else {
            $brgy = DB::table('philippine_barangays')->where('city_municipality_code', $request->value)->get();

            echo "<option disabled selected>Baranggay</option>";
            foreach($brgy as $b){
                echo "<option value='" . $b->barangay_code . "'>". $b->barangay_description ."</option>";
            }
        }
    }

    public function info(Request $request, string $employeeNo) {
        // get employee information
        $employee = EmployeeTable::with([
            'employeeInfo',
            'employeeDepartment',
            'employeeServiceRecord',
            'employeeLeaveCard',
            'employeeFamilyBackground',
            'employeeEducation',
            'employeeCS',
            'employeeWE',
            'employeeVol',
            'employeeLearning',
            'employeeHobby',
            'employeeRecog',
            'employeeMembership',
            'employeeReference',
            'employeeIssuedId'
        ])->where('id', $employeeNo)->first();

        $department = DB::table('departments')->get();

        $salaryGrades = SalaryGrade::where('emp_id', $employeeNo)->get();

        return view('hr.employee-profile', [
            'employee' => $employee,
            'departments' => $department,
            'salaryGrades' => $salaryGrades
        ]);
    }

    public function editEmployeeInfo(Request $request, string $employeeNo) {
        $provinces = DB::table('philippine_provinces')->get();
        $cities = DB::table('philippine_cities')->get();
        $barangays = DB::table('philippine_barangays')->get();
        $department = DB::table('departments')->get();
        $employee = EmployeeTable::find($employeeNo);
        $department = DB::table('departments')->get();

        if($request->method() == 'POST'){
            $family_background_id = $request->family_background_id;
            $spouse_info_id = $request->spouse_info_id;
            $father_info_id = $request->father_info_id;
            $mother_info_id = $request->mother_info_id;
            $employee_personal_information_id = $request->employee_personal_information_id;
            $employee_issued_id_id = $request->employee_issued_id_id;
            $employee_per_add_id = $request->employee_per_add_id;
            $employee_res_add_id = $request->employee_res_add_id;

            $user = User::where('id', $employee->user_id)->first();

            $validation_patterns = [
                'department' => 'required',
                'position'   => 'required',
                'firstname'  => 'required|regex:/^[a-zA-Z\s]+$/u',
                'middlename' => 'required|regex:/^[a-zA-Z\s]+$/u',
                'lastname'   => 'required|regex:/^[a-zA-Z\s]+$/u',
                'employee_number' => ['required', Rule::unique('employee_personal_information', 'employee_number')->ignore($employee_personal_information_id)],
                'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            ];

            $validator = \Validator::make($request->all(), $validation_patterns);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                EmployeeTable::where('id', $employeeNo)->update([
                    'position' => $request->position,
                    'department_id' => $request->department
                ]);

                SpouseInfo::where('id', $spouse_info_id)->update([
                    'firstname' => $request->spouseFirstname ?? null,
                    'middlename' => $request->spouseMiddlename ?? null,
                    'lastname' => $request->spouseLastname ?? null,
                    'extension' => $request->spouseExtension ?? null,
                    'occupation' => $request->spouseOccupation ?? null,
                    'employer' => $request->spouseEmployer ?? null,
                    'busAdd' => $request->spouseBusinessAddress ?? null,
                    'telephone' => $request->spouseTelephone ?? null,
                ]);

                FatherInfo::where('id', $father_info_id)->update([
                    'firstname' => $request->fatherFirstname ?? null,
                    'middlename' => $request->fatherMiddlename ?? null,
                    'lastname' => $request->fatherLastname ?? null,
                    'extension' => $request->fatherExtension ?? null
                ]);

                MotherInfo::where('id', $mother_info_id)->update([
                    'firstname' => $request->motherFirstname ?? null,
                    'middlename' => $request->motherMiddlename ?? null,
                    'lastname' => $request->motherLastname ?? null,
                    'maiden' => null
                ]);

                EmployeeIssuedId::where('id', $employee_issued_id_id)->update([
                    'issuedId' => $request->gid ?? null,
                    'licenseNo' => $request->gnumber ?? null,
                    'issuancePlace' => $request->gissuance ?? null
                ]);

                EmployeePersonalInformation::where('id', $employee_personal_information_id)->update([
                    'firstname'     => $request->firstname,
                    'middlename'    => $request->middlename,
                    'lastname'      => $request->lastname,
                    'extension'    => $request->pe_extension ?? '',
                    'birthday'      => $request->pe_birthday,
                    'birthPlace'    => $request->pe_placeofbirth,
                    'sex'           => $request->pe_sex ?? '',
                    'civilStatus'   => $request->pe_civilstatus ?? '',
                    'height'        => $request->pe_height,
                    'weight'        => $request->pe_weight,
                    'bloodType'    => $request->pe_bloodtype ?? '',
                    'gsis'          => $request->pe_gsis,
                    'pagibig'       => $request->pe_pagibig,
                    'philhealth'    => $request->pe_philhealth,
                    'sss'           => $request->pe_sss,
                    'tin'           => $request->pe_tin,
                    'employee_number'   => $request->employee_number,
                    'citizenship'       => $request->pe_citizenship,
                    'telephone' => $request->pa_telephone,
                    'mobile'    => $request->pa_mobile,
                    'email'     => $request->email
                ]);

                EmployeeChildren::where('family_background_id', $family_background_id)->delete();
                EmployeeEducBack::where('employee_table_id', $employeeNo)->delete();
                EmployeeCivilService::where('employee_table_id', $employeeNo)->delete();
                EmployeeWorkExp::where('employee_table_id', $employeeNo)->delete();
                EmployeeVoluntary::where('employee_table_id', $employeeNo)->delete();
                EmployeeLearning::where('employee_table_id', $employeeNo)->delete();
                EmployeeHobby::where('employee_table_id', $employeeNo)->delete();
                EmployeeOtherSkill::where('employee_table_id', $employeeNo)->delete();
                EmployeeMembership::where('employee_table_id', $employeeNo)->delete();
                EmployeeReference::where('employee_table_id', $employeeNo)->delete();

                if($request->childName){
                    // employee children
                    for($i = 0; $i < count($request->childName); $i++){
                        $children = new EmployeeChildren;
                        $children->family_background_id = $family_background_id;
                        $children->name = $request->childName[$i] ?? null;
                        $children->birthday = $request->childBday[$i] ?? null;
                        $children->save();
                    }
                }

                if($request->educSchoolName){
                    // educational background
                    for($i = 0; $i < count($request->educSchoolName); $i++){
                        $educBack = new EmployeeEducBack;
                        $educBack->employee_table_id = $employeeNo;
                        $educBack->level = $request->educLevel[$i] ?? null;
                        $educBack->school_name = $request->educSchoolName[$i] ?? null;
                        $educBack->degree = $request->educDegree[$i] ?? null;
                        $educBack->fromAtt = $request->educPeriodFrom[$i] ?? null;
                        $educBack->toAtt = $request->educPeriodTo[$i] ?? null;
                        $educBack->highLevel = $request->educUnits[$i] ?? null;
                        $educBack->yearGrad = $request->educYearGraduated[$i] ?? null;
                        $educBack->scholarship = $request->educAwards[$i] ?? null;
                        $educBack->save();
                    }
                }

                if($request->csCareer){
                    // civil service
                    for($i = 0; $i < count($request->csCareer); $i++){
                        $civil = new EmployeeCivilService;
                        $civil->employee_table_id = $employeeNo;
                        $civil->career = $request->csCareer[$i] ?? null;
                        $civil->rating = $request->csRating[$i] ?? null;
                        $civil->conferment = $request->csDateExamConf[$i] ?? null;
                        $civil->conferPlace = $request->csPlaceExamConf[$i] ?? null;
                        $civil->licenseNo = $request->csLicenseNo[$i] ?? null;
                        $civil->licenseDVal = $request->csLicenseDate[$i] ?? null;
                        $civil->save();
                    }
                }

                if($request->wexpPosition){
                    // work experience
                    for($i = 0; $i < count($request->wexpPosition); $i++){
                        $work = new EmployeeWorkExp;
                        $work->employee_table_id = $employeeNo;
                        $work->incFrom = $request->wexpIncFrom[$i] ?? 'Present';
                        $work->incTo = $request->wexpIncTo[$i] ?? null;
                        $work->position = $request->wexpPosition[$i] ?? null;
                        $work->company = $request->wexpDepartment[$i] ?? null;
                        $work->monthlySalary = $request->wexpSalary[$i] ?? null;
                        $work->stepInc = $request->wexpIncrement[$i] ?? null;
                        $work->appointmentStat = $request->wexpStatus[$i] ?? null;
                        $work->govt = $request->wexpIsGovt[$i] ?? null;
                        $work->save();
                    }
                }

                if($request->volOrganizationAddress){
                    // voluntary
                    for($i = 0; $i < count($request->volOrganizationAddress); $i++){
                        $vol = new EmployeeVoluntary;
                        $vol->employee_table_id = $employeeNo;
                        $vol->organization = $request->volOrganizationAddress[$i] ?? null;
                        $vol->incFrom = $request->volIncFrom[$i] ?? null;
                        $vol->incTo = $request->volIncTo[$i] ?? null;
                        $vol->noHours = $request->volHours[$i] ?? null;
                        $vol->position = $request->volPosition[$i] ?? null;
                        $vol->save();
                    }
                }

                if($request->learningOrganizationAddress){
                    // learning
                    for($i = 0; $i < count($request->learningOrganizationAddress); $i++){
                        $learning = new EmployeeLearning;
                        $learning->employee_table_id = $employeeNo;
                        $learning->learningTitle = $request->learningOrganizationAddress[$i] ?? null;
                        $learning->atFrom = $request->learningIncFrom[$i] ?? null;
                        $learning->atTo = $request->learningIncTo[$i] ?? null;
                        $learning->noHours = $request->learningHours[$i] ?? null;
                        $learning->ld = $request->learningLd[$i] ?? null;
                        $learning->conducted = $request->learningSponsored[$i] ?? null;
                        $learning->save();
                    }
                }

                if($request->skills){
                    // hobbies
                    for($i = 0; $i < count($request->skills); $i++){
                        $hobby = new EmployeeHobby;
                        $hobby->employee_table_id = $employeeNo;
                        $hobby->hobby = $request->skills[$i] ?? null;
                        $hobby->save();
                    }
                }

                if($request->academic){
                    // other skills
                    for($i = 0; $i < count($request->academic); $i++){
                        $academic = new EmployeeOtherSkill;
                        $academic->employee_table_id = $employeeNo;
                        $academic->recognition = $request->academic[$i] ?? null;
                        $academic->save();
                    }
                }

                if($request->membership){
                    // membership
                    for($i = 0; $i < count($request->membership); $i++){
                        $membership = new EmployeeMembership;
                        $membership->employee_table_id = $employeeNo;
                        $membership->membership = $request->membership[$i] ?? null;
                        $membership->save();
                    }
                }

                if($request->refName){
                    // reference
                    for($i = 0; $i < count($request->refName); $i++){
                        $reference = new EmployeeReference;
                        $reference->employee_table_id = $employeeNo;
                        $reference->name = $request->refName[$i] ?? null;
                        $reference->address = $request->refAddress[$i] ?? null;
                        $reference->telephone = $request->refTelephone[$i] ?? null;
                        $reference->save();
                    }
                }

                if($request->email){
                    User::where('id', $employee->user_id)->update([ 'email' => $request->email ]);
                }

                return redirect()->back()->with('message', '<strong>Success!</strong> Employee details has been updated successfully');
            }
        }

        return view('hr.edit-employee-details', [
            'provinces' => $provinces,
            'cities' => $cities,
            'barangays' => $barangays,
            'employee' => $employee,
            'departments' => $department
        ]);
    }

    // Service Record
    public function addServiceRecord(Request $request, string $employeeNo) {
        $validation_patterns = [
            'fromDate' => 'required',
            'designation' => 'required',
            'status' => 'required',
            'salary' => 'required',
            'salaryMode' => 'required',
            'office' => 'required',
            'branch' => 'required',
            'remarks' => 'required'
        ];

        $validator = \Validator::make($request->all(), $validation_patterns);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $newsr = new EmployeeServiceRecord;
            $newsr->employee_table_id = $employeeNo;
            $newsr->fromDate = $request->fromDate;
            $newsr->toDate = $request->toDate ?? '';
            $newsr->designation = $request->designation;
            $newsr->status = $request->status;
            $newsr->salary = $request->salary;
            $newsr->mode = $request->salaryMode;
            $newsr->department_id = $request->office;
            $newsr->branch = $request->branch;
            $newsr->leaves = $request->leaves ?? 'None';
            $newsr->remarks = $request->remarks;
            $newsr->save();

            return redirect()->back()->with('message', '<strong>Success!</strong>');
        }
    }

    public function removeServiceRecord(Request $request, string $employeeNo, string $srid) {
        EmployeeServiceRecord::where([ 'employee_table_id' => $employeeNo, 'id' => $srid ])->delete();
        return redirect()->back()->with('message', '<strong>Success!</strong>');
    }

    public function editServiceRecord(Request $request, string $employeeNo, string $srid) {
        $validation_patterns = [
            'fromDate' => 'required',
            'designation' => 'required',
            'status' => 'required',
            'salary' => 'required',
            'salaryMode' => 'required',
            'office' => 'required',
            'branch' => 'required',
            'remarks' => 'required'
        ];

        $validator = \Validator::make($request->all(), $validation_patterns);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            EmployeeServiceRecord::where([ 'employee_table_id' => $employeeNo, 'id' => $srid ])->update([
                'fromDate' => $request->fromDate,
                'designation' => $request->designation,
                'status' => $request->status,
                'salary' => $request->salary,
                'mode' => $request->salaryMode,
                'department_id' => $request->office,
                'branch' => $request->branch,
                'remarks' => $request->remarks
            ]);

            return redirect()->back()->with('message', '<strong>Success!</strong>');
        }
    }

    // Leave Card
    public function addToLeaveCard(Request $request, string $employeeNo) {
        $validation_patterns = [
            'fromDate' => 'required',
            'particulars' => 'required'
        ];

        $validator = \Validator::make($request->all(), $validation_patterns);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $lc = new LeaveCard;
            $lc->employee_table_id = $employeeNo;
            $lc->periodFrom = $request->fromDate;
            $lc->periodTo = $request->toDate ?? '';
            $lc->particulars = $request->particulars;

            $lc->vacEarned = $request->vearned ?? '';
            $lc->vacAbsUnd = $request->vabsund ?? '';
            $lc->vacBal = $request->vbalance ?? '';
            $lc->vacWP = $request->vwp ?? '';
            $lc->vacTotal = $request->vtotal ?? '';

            $lc->sickEarned = $request->searned ?? '';
            $lc->sickAbsUnd = $request->sabsund ?? '';
            $lc->sickBal = $request->sbalance ?? '';
            $lc->sickWP = $request->swp ?? '';
            $lc->sickTotal = $request->stotal ?? '';
            $lc->dateAction = $request->dateaction;
            $lc->save();

            return redirect()->back()->with('message', '<strong>Success!</strong> New record has been added to employee\'s leave card.');
        }
    }

    public function removeLeaveCard(Request $request, string $employeeNo, string $lcid) {
        LeaveCard::where([ 'employee_table_id' => $employeeNo, 'id' => $lcid ])->delete();
        return redirect()->back()->with('message', '<strong>Success!</strong> One of the leave card records has been removed.');
    }

    public function editLeaveCard(Request $request, string $employeeNo, string $lcid){
        $validation_patterns = [
            'fromDate' => 'required',
            'particulars' => 'required'
        ];

        $validator = \Validator::make($request->all(), $validation_patterns);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            LeaveCard::where(['employee_table_id' => $employeeNo, 'id' => $lcid])->update([
                'employee_table_id' => $employeeNo,
                'periodFrom' => $request->fromDate,
                'periodTo' => $request->toDate ?? '',
                'particulars' => $request->particulars,

                'vacEarned' => $request->vearned ?? '',
                'vacAbsUnd' => $request->vabsund ?? '',
                'vacBal' => $request->vbalance ?? '',
                'vacWP' => $request->vwp ?? '',
                'vacTotal' => $request->vtotal ?? '',

                'sickEarned' => $request->searned ?? '',
                'sickAbsUnd' => $request->sabsund ?? '',
                'sickBal' => $request->sbalance ?? '',
                'sickWP' => $request->swp ?? '',
                'sickTotal' => $request->stotal ?? '',
                'dateAction' => $request->dateaction
            ]);

            return redirect()->back()->with('message', '<strong>Success!</strong> Employee\'s Leave card has been updated successfully');
        }
    }

    public function account(Request $request) {
        $departments = Department::all();

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

        return view('hr.account-settings', [ 'departments' => $departments ]);
    }

    public function checkFor3Years(){
        $employee = EmployeeTable::all() ;

        foreach($employee as $emp){
            $checkIfExist = StepNotification::where('employee_table_id', $emp->id)->orderBy('created_at', 'DESC')->first();

           if(now()->diffInYears(\Carbon::parse($emp->entered_date)) >= 3 && (!$checkIfExist || $checkIfExist->managed == 0)){
                $stepNotif = new StepNotification;
                $stepNotif->message = "already reach 3 years in service. Update record if necessary";
                $stepNotif->employee_table_id = $emp->id;
                $stepNotif->save();

            }
        }
    }

    public function stepNotifications(Request $request)
    {new
        $this->checkFor3Years();

        $notif = StepNotification::with('employeeTinfo.employeeInfo')->get();

        if ($request->isMethod('post')) {
            $stepId = $request->stepId;
            $employee = EmployeeTable::findOrFail($request->employeeTableId);

            StepNotification::where('employee_table_id', $request->employeeTableId)->delete();

            $pdf = Pdf::loadView('download.step-notice', [
                'employee' => $employee,
                'data' => $request->all()
            ])->setPaper('legal', 'portrait')->setOptions(['isHtml5ParserEnabled' => true, 'defaultFont' => 'sans-serif']);

            StepNotification::where('id', $stepId)->update([
            ]);

            $employee->update([
                'position' => $request->position,
                'current_salary' => $request->meritValue + $request->lengthOfServiceValue + $employee->current_salary * 30,
                'current_salary_mode' => '/month',
                'entered_date' => now()
            ]);

            return $pdf->download(date('m-d-Y') . '_' . time() . '_notice.pdf');

            return redirect()->back()->with('message', '<strong>Success!</strong>');
        }

        return view('hr.step-notifications', ['notif' => $notif]);
    }

    public function createSalaryGrade(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'emp_id' => 'required|exists:employee_tables,id',
                'step_1' => 'nullable|numeric',
                'step_2' => 'nullable|numeric',
                'step_3' => 'nullable|numeric',
                'step_4' => 'nullable|numeric',
                'step_5' => 'nullable|numeric',
                'step_6' => 'nullable|numeric',
                'step_7' => 'nullable|numeric',
                'step_8' => 'nullable|numeric',
            ]);

            SalaryGrade::create([
                'emp_id' => $request->emp_id,
                'step_1' => $request->step_1,
                'step_2' => $request->step_2,
                'step_3' => $request->step_3,
                'step_4' => $request->step_4,
                'step_5' => $request->step_5,
                'step_6' => $request->step_6,
                'step_7' => $request->step_7,
                'step_8' => $request->step_8,
            ]);

            return redirect()->back()->with('message', '<strong>Success!</strong> Salary Grade has been added successfully');
        }

        return view('hr.new-salary-grade');
    }

    public function removeSalaryGrade(Request $request, $salaryGradeId)
    {
        // Validate that the salary grade exists
        $salaryGrade = SalaryGrade::find($salaryGradeId);

        if (!$salaryGrade) {
            return redirect()->back()->with('error', 'Salary Grade not found');
        }

        $salaryGrade->delete();

        return redirect()->back()->with('message', '<strong>Success!</strong> Salary Grade has been removed successfully');
    }

    public function updateSalaryGrade(Request $request, $gradeId)
    {
        \Log::info('Incoming request data:', $request->all()); // Debugging: log incoming data

        try {
            $grade = SalaryGrade::findOrFail($gradeId);

            $grade->step_1 = $request->input('step1');
            $grade->step_2 = $request->input('step2');
            $grade->step_3 = $request->input('step3');
            $grade->step_4 = $request->input('step4');
            $grade->step_5 = $request->input('step5');
            $grade->step_6 = $request->input('step6');
            $grade->step_7 = $request->input('step7');
            $grade->step_8 = $request->input('step8');

            $grade->save();

            \Log::info('Salary grade updated successfully:', $grade); // Debugging: log updated grade

            return response()->json(['message' => 'Salary grade updated successfully.']);
        } catch (\Exception $e) {
            \Log::error('Error updating salary grade: ' . $e->getMessage());
            return response()->json(['message' => 'Error updating salary grade.'], 500);
        }
    }

    public function updateLeaveCredits(Request $request, $employeeId)
    {
        try {
            $employee = Employee::findOrFail($employeeId);
            $leaveType = $request->input('leave_type');
            $newCredits = $request->input('count');

            // Log the received input
            \Log::info('Updating leave credits', [
                'employeeId' => $employeeId,
                'leaveType' => $leaveType,
                'newCredits' => $newCredits
            ]);

            // Update the respective leave type
            switch ($leaveType) {
                case 'mandatoryLeave':
                    $employee->mandatoryLeave = $newCredits;
                    break;
                case 'maternityLeave':
                    $employee->maternityLeave = $newCredits;
                    break;
                case 'paternityLeave':
                    $employee->paternityLeave = $newCredits;
                    break;
                case 'specialPrivilegeLeave':
                    $employee->specialPrivilegeLeave = $newCredits;
                    break;
                case 'soloParentLeave':
                    $employee->soloParentLeave = $newCredits;
                    break;
                case 'studyLeave':
                    $employee->studyLeave = $newCredits;
                    break;
                case 'rehabilitationLeave':
                    $employee->rehabilitationLeave = $newCredits;
                    break;
                case 'specialLeaveForWomen':
                    $employee->specialLeaveForWomen = $newCredits;
                    break;
                case 'specialEmergencyLeave':
                    $employee->specialEmergencyLeave = $newCredits;
                    break;
                case 'adoptionLeave':
                    $employee->adoptionLeave = $newCredits;
                    break;
                default:
                    throw new \Exception('Invalid leave type');
            }

            $employee->save();

            return response()->json(['message' => 'Leave credits updated successfully.']);
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('Error updating leave credits: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json(['message' => 'Error updating leave credits: ' . $e->getMessage()], 500);
        }
    }


}
