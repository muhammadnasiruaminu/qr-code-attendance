<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments    =   Department::all();
        return view('admin.department', ['departments' => $departments]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create-department');
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
            'departmentName'  => 'required|string',
            'departmentInitial'  => 'required|string',
            'faculty'  => 'required|string',
        ]);

        $dept = Department::create([
            'uuid'               =>  Str::orderedUuid(),
            'department_name'    =>  $request->departmentName,
            'department_initial' =>  $request->departmentInitial,
            'faculty'            =>  $request->faculty
        ]);

        if ($dept) {
            return redirect()->back()->with('success','Department created successfully.');
        } else {
            return redirect()->back()->with('error','Something wents wrong, try again.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department, $uuid)
    {
        // return $uuid;
        $request->validate([
            'departmentName'    => 'required|string',
            'departmentInitial' => 'required|string',
            'faculty'           => 'required|string',
        ]);

        $editDept               =   Department::where('uuid', $uuid)->update([
            'department_name'   =>  $request->departmentName,
            'department_initial'=>  $request->departmentInitial,
            'faculty'           =>  $request->faculty,
        ]);

        if ($editDept) {
            return redirect()->back()->with('success','Record updated successfully.');
        } else {
            return redirect()->back()->with('error','Something wents wrong, try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
