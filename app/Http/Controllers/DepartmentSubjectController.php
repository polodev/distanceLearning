<?php

namespace App\Http\Controllers;

use App\Department;
use App\DepartmentSubject;
use App\Subject;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartmentSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::OrderBy('created_at', 'desc')->get();
        return view('admin.department_subject.department_subject', compact('departments'));
    }

    public function single_department($department_id)
    {

        $groups = DepartmentSubject::Where('department_id', $department_id)->groupBy('group')->lists('group');
        $department_name = DepartmentSubject::find($department_id)->department->department_name;
        foreach ($groups as $group) {
            ${$group} =  $department_subjects = DepartmentSubject::Where('department_id' , $department_id)->where('group', $group)->get();
        }
        $data = [];
        foreach ($groups as $group) {
            $data[$group] = ${$group};
        }
        $data['groups'] = $groups;
        $data['department_name'] = $department_name;
        return view('admin.department_subject.department_subject_single', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $subjects = Subject::all();
        return view('admin.department_subject.department_subject_create', compact('departments', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'department_id' => 'required',
            'subject_id' => 'required',
            'group' => 'required'
        ];
        $this->validate($request, $rule);
        $department_subject = new DepartmentSubject($request->all());
        $department_subject->save();
        return redirect('admin/department_subject/create')->with('status', "Subject assign successfully");
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
        $departments = Department::all();
        $subjects = Subject::all();
        $department_subject = DepartmentSubject::find($id);
        return view('admin.department_subject.department_subject_edit', compact('departments', 'subjects', 'department_subject'));
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
}
