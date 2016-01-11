<?php

namespace App\Http\Controllers;

use App\Degree;
use App\Department;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.department.department', compact('departments'));
    }

    public function search(Request $request)
    {
        $search = $request->input('department_search');
        $departments = Department::where('department_name', 'like', "%$search%")->orderBy('created_at', 'desc')->get();
        return view('admin.department.department_search', compact('departments', 'search'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $degrees = Degree::all();
        return view('admin.department.department_create', compact('degrees'));
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
            'department_name' => 'required | min:2',
            'department_credit' => 'required',
            'degree_id' => 'required'
        ];
        $this->validate($request, $rule);
        $department = new Department($request->all());
        $department->save();
        return redirect('admin/department/create')->withStatus('Degree name saves successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        return view('admin.department.department_info', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        $degrees = Degree::all();
        return view('admin.department.department_edit', compact('department', 'degrees'));
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
        $department = Department::find($id);
        $rule = [
            'department_name' => 'required | min:2',
            'department_credit' => 'required',
            'degree_id' => 'required'
        ];
        $this->validate($request, $rule);
        $department->department_name = $request->get('department_name');
        $department->department_credit = $request->get('department_credit');
        $department->degree_id = $request->get('degree_id');
        $department->save();

        return redirect('admin/department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Department::find($id)->delete();
        return redirect('admin/department');
    }
}
