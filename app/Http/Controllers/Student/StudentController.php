<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentInfo;

class StudentController extends Controller
{
	public function index()
	{
		$studentData = StudentInfo::all();
		$students = [];
        foreach ($studentData as $key => $value) {
           array_push($students,[
				'name'         => $value->name,
				'email'        => $value->email,
				'roll'         => $value->roll,
				'session'      => $value->session,
				'phone_number' => $value->phone_number,
				'id'           => $value->id,
           ]);
        }
		return response()->json([
			'status' => true,
			'data'   => $students
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'name'         => 'required',
			'email'        => 'required|email',
			'password'     => 'required|min:4|max:8',
			'roll'         => 'required|numeric',
			'session'      => 'required',
			'phone_number' => 'required',
    	]);
    	try {
			StudentInfo::create(array_merge(
				$request->except('_token', 'password'),
				['password' => bcrypt($request->password)]
			));

			return response()->json([
				'status'  => true,
				'message' => 'Student Added Successfully'
			]);
		} catch (\Exception $e) {
			return response()->json([
				'status'  => false,
				'message' => "Something Went Wrong!"
			]);
		}
	}

	public function show($id)
	{		
		$student = StudentInfo::find($id);
		return response()->json([
			'status'  => true,
			'data'    => $student
		]);
	}

	public function update(Request $request)
	{
		$request->validate([
			'name'         => 'required',
			'email'        => 'required|email',
			'roll'         => 'required|numeric',
			'session'      => 'required',
			'phone_number' => 'required',
    	]);
    	$student  = StudentInfo::find($request->id);
		$student->name         = $request->name;
		$student->email        = $request->email;
		$student->roll         = $request->roll;
		$student->session      = $request->session;
		$student->phone_number = $request->phone_number;
		$student->update();
		return response()->json([
			'status'  => true,
			'message' => 'Student Information Update Successfully'
		]);

	}

	public function destroy($id)
	{
		$student = StudentInfo::find($id);
		$student->delete();

		return response()->json([
				'status'  => true,
				'message' => 'Student Delete Successfully!'
		]);

	}
}
