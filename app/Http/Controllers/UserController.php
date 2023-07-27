<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\Models\User;
use App\Models\CheckUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Models\CourseOfStudy;
use App\Models\JoinAttendance;
use App\Models\CreateAttendance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('user.dashboard');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    public function users()
    {
        $users  =   User::all();
        return view('user.index', ['users' => $users]);
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
            'fullName'   =>   'required|string',
            'psn'        =>   'required|string|unique:users,psn',
            'email'      =>   'required|string|unique:users,email',
            'phoneNumber'=>   'required|string',
        ]);

        $create = User::create([
            'uuid'           =>   Str::orderedUuid(),
            'full_name'      =>   $request->fullName,
            'psn'            =>   $request->psn,
            'email'          =>   $request->email,
            'phone_number'   =>   $request->phoneNumber,
            'password'       =>   Hash::make(123456)
        ]);
        if ($create) {
            return redirect()->back()->with('success','Account creation successfull. Kindly use 123456 as your default password for login.');
        }else {
            return redirect()->back()->with('error', 'Something wents wrong.');
        }


    }

    public function loginPage()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'psn'       =>  'required|string',
            'password'  =>  'required|string|min:5'
        ]);

        if (Auth::attempt(['psn' => $request->psn, 'password' => $request->password, 'is_active' => 1])) {
            // return redirect()->intended('dashboard');
            return redirect()->route('staff.index');
        } else {
            return redirect()->back()->with('error', 'Something wents wrong.');
        }
        
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('staff.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function uploadStudentsPage()
    {
        return view('admin.upload-students');
    }

    public function uploadStudents(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xls,xlsx']);

        $path   =    $request->file('file')->getRealPath();

        $data   =   Excel::load($path)->get();

        if ($data->count() > 0) {
            foreach ($data->toArray() as $key => $value) {
                foreach ($value as $row) {
                    $insert_data[]  =  array(
                        'names'               => $row['names'],
                        'registration_number' => $row['registration_number'],
                        'level'               => $row['level']
                    );
                }
            }
            if (!empty($insert_data)) {
                // checkUser::create();
                DB::table('check_users')->insert($insert_data);

            }
        }
        return redirect()->back()->with('success', 'Students uploaded.');
    }

    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);

        return redirect()->back()->with('success', 'User Imported Successfully');
    }

    public function authenticateStudentPage($token)
    {
        $check   =   CreateAttendance::where(['token' => $token, 'active_status' => '1'])->where('ends_at', '>=', date('H:i'))->first();
        // return $check->ends_at.' with '. date('H:i');
        // return date('g-i'); where ends is <= now
        if ($check) {
            // check so as not to attend same lecture twice
            $checkDouble    =   JoinAttendance::where(['registration_number' => Auth::guard('student')->user()->registration_number, 'create_attendances_uuid' => $check->uuid])->first();
            if ( $checkDouble) {
                return redirect()->route('student.index')->with('error', 'Attendance already captured.');
            } else {
                $save  = [
                    'uuid'                   =>    Str::orderedUuid(),
                    'names'                  =>    Auth::guard('student')->user()->names,
                    'registration_number'    =>    Auth::guard('student')->user()->registration_number,
                    'create_attendances_uuid'=>    $check->uuid,
                ];

                $attend  =   JoinAttendance::insertOrIgnore($save);

            }
            
            if ($attend) {
                return redirect()->route('student.index')->with('success', 'Attendance captured successfully, Thank you.');
            } else {
                return redirect()->route('student.index')->with('error', 'Something wents wrong.');
            }
            

        } else {
            return redirect()->route('student.index')->with('error', 'Attendance not found, kindly contact administrator.');
 
        }
        
        // return view('user.authenticate-student');
    }

    // public function authenticateStudent()
    // {
    //     return CreateAttendance::all();
    // }
}
