<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\CourseOfStudy;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course =  Student::with('courseOfStudy')->get();
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uuid)
    {
        // return $uuid;
        $course     =   CourseOfStudy::all();
        $student    =   Student::where('uuid', $uuid)->first();
        return view('student.create')->with(['key' => $course, 'stud' => $student]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $uuid)
    {
        // return $request;
        $request->validate([
            'fullName'      =>   'required|string',
            'regNumber'     =>   'required|string',
            'email'         =>   'required|string',
            'phoneNumber'   =>   'required|string',
            'level'         =>   'required|string',
            'courseOfStudy' =>   'required|string'
        ]);

        $update                        =   Student::where('uuid',$uuid)->first();
        $update->full_name             =   $request->fullName;
        $update->reg_number            =   $request->regNumber;
        $update->email                 =   $request->email;
        $update->phone_number          =   $request->phoneNumber;
        $update->level                 =   $request->level;
        $update->course_of_study_uuid  =   $request->courseOfStudy;
        $ok = $update->save();
        if ($ok) {
            return 'updated';
        }else {
            return 'akwai matsala';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, $uuid)
    {
       $student    =   Student::with('courseOfStudy')->where('uuid', $uuid)->get();
        // $student    =   Student::where('uuid', $uuid)->first();
        // return $student;
        return view('student.dashboard',['key' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function registerPage()
    {
        return view('student.register');
    }

    public function register(Request $request)
    {
        // return $request;
        $request->validate([
            'fullName'   =>  'required|string',
            'regNumber'  =>  'required|string',
            'email'      =>  'required|string'
        ]);

        $reg_student    =   Student::create([
            'uuid'      =>  Str::orderedUuid(),
            'full_name' =>  $request->fullName,
            'reg_number' =>  $request->regNumber,
            'email'     =>  $request->email,
        ]);

        $_SESSION['username']   =   $reg_student->full_name;

        // return $_SESSION['username'];
        return redirect()->route('student.create')->with('success','Account creation successfull. Kindly login to complete your profile.');
    }
}
