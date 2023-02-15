<?php

namespace App\Http\Controllers;

use App\Models\CreateAttendance;
use Illuminate\Http\Request;
use App\Models\Curriculum;
use Illuminate\Support\Str;
use App\Models\User;



class CreateAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function qrcode($uuid)
    {
        $validate = User::all();
        // $validate = User::where('uuid', $uuid)->first();
        if ($validate) {

            $att  =   CreateAttendance::with('curriculum')->where('uuid', $uuid)->first();

        } else {
            return 'you are not a valid student';
        }

        // $att  =     CreateAttendance::with('curriculum')->where('uuid', $uuid)->first();
        return view('staff.qrcode', ['attend_qr' => $att]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $createdAtt = CreateAttendance::with('curriculum')->get();
        $curriculum = Curriculum::all();
        return view('staff.create-attendance', ['curriculum' => $curriculum, 'createdAtt' => $createdAtt]);

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
            'course_code'  =>  'required|string',
            'starts_at'  =>  'required|string',
            'ends_at'    =>  'required|string',
        ]);

        $creatAtt        =   CreateAttendance::create([
            'uuid'       =>  Str::orderedUuid(),
            'course_uuid'=>  $request->course_code,
            'starts_at'  =>  $request->starts_at,
            'ends_at'    =>  $request->ends_at,
            'token'      =>  Str::random(50),
        ]);

        if ($creatAtt) {
            return redirect()->back()->with('success','Attendance created successfully.');
        } else {
            return redirect()->back()->with('error','Something wents wrong!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreateAttendance  $createAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(CreateAttendance $createAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreateAttendance  $createAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(CreateAttendance $createAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreateAttendance  $createAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreateAttendance $createAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreateAttendance  $createAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreateAttendance $createAttendance)
    {
        //
    }

    public function startAttendance($uuid)
    {
        $startAttendance = CreateAttendance::where('uuid', $uuid)->update([
            'active_status' =>   '1'
        ]);
        if ($startAttendance) {
            return redirect()->back()->with('success','Attendance started successfully.');
        } else {
            return redirect()->back()->with('error','Something wents wrong!');
        }
          
    }

    public function stopAttendance($uuid)
    {
        $stopAttendance = CreateAttendance::where('uuid', $uuid)->update([
            'active_status' =>   '0'
        ]);
        if ($stopAttendance) {
            return redirect()->back()->with('success','Attendance stopped successfully.');
        } else {
            return redirect()->back()->with('error','Something wents wrong!');
        }
          
        // return $createAttendance;
    }

}
