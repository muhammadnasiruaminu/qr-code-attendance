<?php

namespace App\Http\Controllers;

use App\Models\JoinAttendance;
use Illuminate\Http\Request;
use App\Models\CreateAttendance;


class JoinAttendanceController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uuid) // create attendance uuid
    {
        // return $uuid;
        $join = CreateAttendance::with('curriculum')->where('uuid', $uuid)->first();
        $viewJoined     =   JoinAttendance::with('createAttendance.curriculum')->where('create_attendances_uuid', $uuid)->get();
        return view('staff.join-attendance', ['course' => $join, 'attendees' => $viewJoined]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JoinAttendance  $joinAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(JoinAttendance $joinAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JoinAttendance  $joinAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(JoinAttendance $joinAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JoinAttendance  $joinAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JoinAttendance $joinAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JoinAttendance  $joinAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(JoinAttendance $joinAttendance)
    {
        $deleteAtt  =   $joinAttendance->delete();
        if ($deleteAtt) {
            return redirect()->back()->with('success','Attendance deleted successfully.');
        } else {
            return redirect()->back()->with('error','Something wents wrong!');
        }
        
    }
}
