<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\StudentInfo;



class Authcontroller extends Controller
{
	
    public function checkValidUser(Request $request)
    {
    	$request->validate([
            'email'    => 'required|email',
            'password' => 'required'
    	]);
        $credentials = $request->except(['_token']);
        if (auth()->attempt($credentials)) {
                return response()->json([
                    'status'  => true,
                    'type'    => 'admin',
                    'message' => 'Login Successfullly!'

                ]);
            }else{
                $checkStudent   = StudentInfo::whereEmail($request->email)->first();

                if($checkStudent && \Hash::check($request->password, $checkStudent->password) ){
                    Session()->put('email', $checkStudent->email);
                    return response()->json([
                        'status'  => true,
                        'type'    => 'student',
                        'data'    => $checkStudent,
                        'message' => 'Login Successfullly!'
                    ]);
                }else{
                     return response()->json([
                        'status'  => false,
                        'message' => 'Something Went Wrong'
                    ]);
                }

            }
    }

    public function logout()
    {
    	Session::flush();
        Auth::logout();

        return response()->json([
            'status' => true
        ]);
    }

    public function dashboardView()
	{
		return view('admin.dashboard');
	}

    public function StudentDashboardView()
    {
        return view('student.dashboard');
    }
  
}
