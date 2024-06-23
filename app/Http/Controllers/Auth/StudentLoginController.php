<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class StudentLoginController extends Controller
{
    private $student;
    public function login()
    {
        return view('student.login');
    }
    public function loginCheck(Request $request)
    {
       $this->student =Student::where('Email', $request->email)->first();
       if ($this->student){
           if ($request->password==$this->student->password){
               Session::put('student_id',$this->student->id);
               Session::put('student_name',$this->student->name);
               return redirect('student/dashboard');
           }
           else{
               return redirect('student/login')->with('message','password is wrong');
           }
       }
       else{
        return Redirect::back()->withErrors(['message' => 'Invalid credentials']);
       }
    }
    public function logout(){
        Session::forget('student_id');
        Session::forget('student_name');
        return redirect('student/login');
    }

}
