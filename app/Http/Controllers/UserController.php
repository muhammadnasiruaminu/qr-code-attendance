<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckUser;
use App\Models\CourseOfStudy;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\CreateAttendance;
use Excel;
use DB;
use App\Imports\UsersImport;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function openCamera()
    {
        return view('user.open-camera');
    }

    public function index()
    {
        if (session()->has('loggedUser')) {
            $user  =  User::where('uuid', '=', session('loggedUser'))->first();
            $data  =  [
                'loggedUserInfo' => $user
            ];
        } else{
            // return 'bakayi login ba';
            return redirect()->route('user.login');
        }
        $activeClass  =   CreateAttendance::with('curriculum')->where('active_status','1')->get();
        return view('user.dashboard', $data, ['activeClassess' => $activeClass]);
    }

    public function checkUserPage()
    {
        //
        return view('user.check-user');
    }

    public function checkUser(Request $request)
    {
        $request->validate([
            'registrationNumber' => 'required|string|unique:users,registration_number'
        ]);
        $check = CheckUser::where('registration_number',$request->registrationNumber)->first();
        if ($check) {
            // $user_sess = $_SESSION['username'];
            return redirect()->route('user.create')->with('success','Registration Number found, you can proceed with your registration.');
        } else {
            return redirect()->back()->with('error', 'Registration Number not found, please contact the administrator if you are a valid student.');
        }

        return view('user.check-user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $course     =   CourseOfStudy::all();
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'registrationNumber'=>   'required|string|unique:users,registration_number',
            'level'             =>   'required|string',
            'fullName'          =>   'required|string',
            'email'             =>   'required|string',
            'phoneNumber'       =>   'required|string',
            'password'          =>   'required|string|min:5',
        ]);

        $register                =   User::create([
            'uuid'               =>  Str::orderedUuid(),
            'name'               =>  $request->fullName,
            'registration_number'=>  $request->registrationNumber,
            'email'              =>  $request->email,
            'is_staff'           =>  $request->is_staff,
            'is_verified'        =>  1,
            'password'           =>  Hash::make($request->password),
        ]);

        if ($register) {
            $request->session()->put('loggedUser', $register->uuid);
            return redirect()->route('user.index')->with('success', 'Registration successful, kindly login to continue.');
            // return redirect()->route('user.index')->with('success', 'Registration successful.');
        } else {
            return redirect()->back()->with('error', 'Something wents wrong.');
        }


    }

    public function loginPage()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        // return $request;
        $request->validate([
            'registrationNumber'=>  'required|string',
            'password'          =>  'required|string|min:5'
        ]);

    //    $user = User::where('registration_number', '=', $request->registrationNumber)->first();
    $user = User::where(['registration_number' => $request->registrationNumber, 'is_verified' => 1])->first();
       if ($user) {
           if (Hash::check($request->password, $user->password)) {
               $request->session()->put('loggedUser', $user->uuid);
               return redirect()->route('user.index');
           } else {
            return redirect()->back()->with('error', 'Invalid password.');
           }

       } else {
        return redirect()->back()->with('error', 'No account found for this Registration Number.');
       }

    }

    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->pull('loggedUser');
            return redirect()->route('user.login');
        }
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
        //
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
        // return DB::select('select * from staff where 1');
    //    return DB::table('staff')->get();
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

    public function authenticateStudentPage()
    {
        return CreateAttendance::all();
        // return view('user.authenticate-student');
    }

    // public function authenticateStudent()
    // {
    //     return CreateAttendance::all();
    // }
}
