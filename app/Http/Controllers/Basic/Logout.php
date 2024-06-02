<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class Logout extends Controller {
    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
