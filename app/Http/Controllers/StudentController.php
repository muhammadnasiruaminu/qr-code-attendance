<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\CheckUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseOfStudy;
use App\Models\CreateAttendance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeClass  =   CreateAttendance::with('curriculum')->where('active_status','1')->get();
        return view('student.dashboard', [ 'activeClassess' => $activeClass]);
    }

    public function checkStudentPage()
    {
        return view('student.check-student');
    }

    public function checkStudent(Request $request)
    {
        $request->validate([
            'registrationNumber' => 'required|string|unique:students,registration_number'
        ]);
        $check = CheckUser::where('registration_number',$request->registrationNumber)->first();
        if ($check) {
            return redirect()->route('student.create')->with('success','Registration Number found, you can proceed with your registration.');
        } else {
            return redirect()->back()->with('error', 'Registration Number not found, please contact the administrator if you are a valid student.');
        }

        return view('student.check-student');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'registrationNumber'=>   'required|string|unique:users,registration_number',
            // 'level'             =>   'required|string',
            'fullName'          =>   'required|string',
            'email'             =>   'required|string',
            // 'phoneNumber'       =>   'required|string',
            'password'          =>   'required|string|min:5',
        ]);

        $register                =   Student::create([
            'uuid'               =>  Str::orderedUuid(),
            'names'               =>  $request->fullName,
            'registration_number'=>  $request->registrationNumber,
            'email'              =>  $request->email,
            'is_staff'           =>  '0',
            'is_verified'        =>  1,
            'password'           =>  Hash::make($request->password),
        ]);

        if ($register) {
            $request->session()->put('loggedUser', $register->uuid);
            return redirect()->route('student.index')->with('success', 'Registration successful, kindly login to continue.');
        } else {
            return redirect()->back()->with('error', 'Something wents wrong.');
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

    

    public function studentLoginPage()
    {
        return view('student.login');
    }

    public function studentLogin(Request $request)
    {
        $request->validate([
            'registrationNumber'=>  'required|string',
            'password'          =>  'required|string|min:5'
        ]);

        if (Auth::guard('student')->attempt(['registration_number' => $request->registrationNumber, 'password' => $request->password, 'is_verified' => 1])) {
            // return Auth::guard('student')->user();
            return redirect()->route('student.index');
        } else {
            return redirect()->back()->with('error', 'Something wents wrong.');
        }

    }

    public function studentLogout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }

    public function openCamera()
    {
        return view('student.open-camera');
    }
}
