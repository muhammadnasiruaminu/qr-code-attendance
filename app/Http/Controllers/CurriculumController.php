<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CurriculumController extends Controller
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
    public function create()
    {
        $curriculum  =  Curriculum::all();
        return view('admin.curriculum', ['curricula' => $curriculum]);
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
            'courseCode'   =>  'required|string',
            'courseTitle'  =>  'required|string',
            'creditUnit'   =>  'required|string',
            // 'activeStatus' =>  'required|string'
        ]);

        $saveCurr = Curriculum::create([
            'uuid'   => Str::orderedUuid(),
            'course_code'   => $request->courseCode,
            'course_title'   => $request->courseTitle,
            'course_unit'   => $request->creditUnit,
            // 'active_status'   => 1,
        ]);

        if ($saveCurr) {
            return redirect()->back()->with('success','Curriculum created successfully.');
        } else {
            return redirect()->back()->with('error','Something wents wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function show(Curriculum $curriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function edit(Curriculum $curriculum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curriculum $curriculum)
    {
        $request->validate([
            'courseCode'   =>  'required|string',
            'courseTitle'  =>  'required|string',
            'creditUnit'   =>  'required|string',
        ]);

        $editCurriculum  =   Curriculum::where('uuid', $curriculum->uuid)->update([
            'course_code'   => $request->courseCode,
            'course_title'   => $request->courseTitle,
            'course_unit'   => $request->creditUnit,
        ]);

        if ($editCurriculum) {
            return redirect()->back()->with('success','Record updated successfully.');
        } else {
            return redirect()->back()->with('error','Something wents wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curriculum $curriculum)
    {
        //
    }
}
