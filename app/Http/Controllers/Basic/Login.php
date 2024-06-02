<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function login(Request $request)
    {
        if($request->method() == "POST"){
            $validation_patterns = [
                'email' => 'email|required|string',
                'password' => 'required|string'
            ];

            $validator = \Validator::make($request->only('email', 'password'), $validation_patterns);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                if(Auth::attempt($request->only('email', 'password'))){
                    $role = Auth::user()->role;
                    // success
                    if($role == 1 || $role == 2){
                        return redirect('/welcome/hr/dashboard');
                    } else if($role == 3){
                        return redirect('/welcome/mayor/dashboard');
                    } else if($role == 4) {
                        return redirect('/welcome/dh/dashboard');
                    } else {
                        return redirect('/welcome/employee/dashboard');
                    }
                } else {
                    return redirect()->back()->withErrors('Invalid username or password');
                }
            }
        }

        return view('welcome');
    }
}
