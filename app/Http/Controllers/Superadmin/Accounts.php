<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\EmployeePosition;
use App\Models\Heads_personal_info;

class Accounts extends Controller
{
    public function all(Request $request){
        $departments = Department::all();

        if($request->method() == "POST"){
            if($request->role){
                $validation_patterns = [
                    'email'         => 'email|required|string',
                    'password'      => ['min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/', 'required' ],
                    'firstname'     => 'required|regex:/^[a-zA-Z\s]+$/u',
                    'middlename'    => 'required|regex:/^[a-zA-Z\s]+$/u',
                    'lastname'      => 'required|regex:/^[a-zA-Z\s]+$/u',
                    'role'          => 'required',
                    'department'    => 'required'
                ];

                $validator = \Validator::make($request->all(), $validation_patterns);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                } else {
                    $head = new User;
                    $head->email = $request->email;
                    $head->password = $request->password;
                    $head->role = $request->role;
                    $head->save();

                    $headInfo = new Heads_personal_info;
                    $headInfo->user_id = $head->id;
                    $headInfo->firstname = $request->firstname;
                    $headInfo->middlename = $request->middlename;
                    $headInfo->lastname = $request->lastname;
                    $headInfo->avatar = 'logo.png';
                    $headInfo->department_id = $request->department;
                    $headInfo->save();
                }
            }

            return redirect()->back()->with('message', '<strong>Done!</strong>');
        }

        return view('superadmin.main', [ 'departments' => $departments ]);
    }
}
