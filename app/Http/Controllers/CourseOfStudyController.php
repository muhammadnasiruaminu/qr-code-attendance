<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseOfStudy;

class CourseOfStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course         =   CourseOfStudy::with('department')->get();
        $departments    =   Department::all();
        return view('admin.show-courses', ['courses' => $course, 'departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments    =   Department::all();
        return view('admin.course', ['departments' => $departments]);
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
            'department'  =>  'required|string',
            'courseName'  =>  'required|string',
            'duration'    =>  'required|string',
        ]);

        CourseOfStudy::create([
            'uuid'  => Str::orderedUuid(),
            'department'      =>  $request->department,
            'course_of_study' =>  $request->courseName,
            'duration'        =>  $request->duration,
        ]);

        return redirect()->back()->with('success','Record saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseOfStudy  $courseOfStudy
     * @return \Illuminate\Http\Response
     */
    public function show(CourseOfStudy $courseOfStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseOfStudy  $courseOfStudy
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseOfStudy $courseOfStudy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseOfStudy  $courseOfStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseOfStudy $courseOfStudy)
    {
        // return $courseOfStudy;
        $request->validate([
            'department'  =>  'required|string',
            'courseName'  =>  'required|string',
            'duration'    =>  'required|string',
        ]);

       $updateCourse    =    CourseOfStudy::where('uuid', $courseOfStudy->uuid)->update([
            'department_uuid' =>  $request->department,
            'course_of_study' =>  $request->courseName,
            'duration'        =>  $request->duration,
        ]);

        if ($updateCourse) {
            return redirect()->back()->with('success','Record updated successfully.');
        } else {
            return redirect()->back()->with('error','Something wents wrong, try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseOfStudy  $courseOfStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseOfStudy $courseOfStudy)
    {
        //
    }
}
