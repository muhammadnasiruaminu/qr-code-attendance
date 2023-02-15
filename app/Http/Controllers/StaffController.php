<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\CourseOfStudy;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\CreateAttendance;
use App\Models\Student;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (session()->has('loggedUser')) {
            $staff = Staff::where('uuid', session('loggedUser'))->first();
            $data = [
                'loggedStaffInfo'    =>  $staff
            ];

        } else {
            return redirect()->route('staff.login');
        }

        return view('staff.dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dept   =   Department::all();
        // $stf    =   Staff::where('uuid', $uuid)->first();
        return view('staff.create',['key' => $dept]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'fullName'   =>   'required|string',
            'psn'        =>   'required|string|unique:staff,psn',
            'email'      =>   'required|string',
            'phoneNumber'=>   'required|string',
            'department' =>   'required|string'
        ]);

        // $update                   =   Staff::where('uuid',$uuid)->first();
        // $update->full_name        =   $request->fullName;
        // $update->psn              =   $request->psn;
        // $update->email            =   $request->email;
        // $update->phone_number     =   $request->phoneNumber;
        // $update->department_uuid  =   $request->department;
        // $ok = $update->save();
        $create = Staff::create([
            'uuid'           =>   Str::orderedUuid(),
            'full_name'      =>   $request->fullName,
            'psn'            =>   $request->psn,
            'email'          =>   $request->email,
            'phone_number'   =>   $request->phoneNumber,
            'department_uuid'=>   $request->department,
            'password'      =>  123456
        ]);
        if ($create) {
            return redirect()->back()->with('success','Account creation successfull. Kindly use 123456 as your default password for login.');
        }else {
            return redirect()->back()->with('error', 'Something wents wrong.');
        }
    }

    public function staffLoginPage()
    {
        return view('staff.staff-login');
    }

    public function staffLogin(Request $request)
    {
        // return $request;
        $request->validate([
            'psn'       =>  'required|string',
            'password'  =>  'required|string|min:5'
        ]);

        // if(Auth::guard('staff'))
        // Auth::attempt(['email' => $email, 'password' => $password])

       $staff  =  Staff::where(['psn' => $request->psn])->first();
       if ($staff) {
            $found  =  Staff::where(['psn' => $request->psn, 'password' => $request->password])->first();

            if ($found) {
                $request->session()->put('loggedUser', $found->uuid);
                return redirect()->route('staff.index');
            } else {
                return redirect()->back()->with('error', 'Invalid password.');
            }

        } else {
            return redirect()->back()->with('error', 'User does not exist!');
       }

    }

    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->pull('loggedUser');
            return redirect()->route('staff.login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // return $student    =   Staff::with('courseOfStudy')->where('uuid', $uuid)->get();
        // $staff    =   Staff::where('uuid', $uuid)->first();
        $createAtt  =  CreateAttendance::all();
        $listAtt    =  Student::with('courseOfStudy')->get();
        // return view('staff.create-attendance', ['attendances' => $createAtt, 'listAtt' => $listAtt]);
        // return view('staff.dashboard',['key' => $staff]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }

    // public function registerStfPage()
    // {
    //     return view('staff.register-staff');
    // }

    // public function registerStf(Request $request)
    // {
    //     // return $request;
    //     $request->validate([
    //         'fullName'   =>  'required|string',
    //         'psn'  =>  'required|string',
    //         'email'      =>  'required|string'
    //     ]);

    //     $reg_staff    =   Staff::create([
    //         'uuid'      =>  Str::orderedUuid(),
    //         'full_name' =>  $request->fullName,
    //         'psn'       =>  $request->psn,
    //         'email'     =>  $request->email,
    //     ]);

    //     $_SESSION['username']   =   $reg_staff->full_name;

    //     return redirect()->back()->with('success','Account creation successfull. Kindly login to complete your profile.');
    // }

}
