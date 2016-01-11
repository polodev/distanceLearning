<?php

namespace App\Http\Controllers;

use App\Degree;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.degree.degree')->with('degrees', Degree::OrderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.degree.degree_create');
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
            'degree_name' => 'required | min: 3'
        ];
        $this->validate($request, $rule);
        $degree = new Degree($request->all());
        $degree->save();
        return redirect('/admin/degree/create')->with('status', 'Degree saves successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $degree = Degree::find($id);
        return view('admin.degree.degree_info', compact('degree'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $degree = Degree::find($id);
        return view('admin.degree.degree_edit', compact('degree'));
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
        $rule = [
            'degree_name' => 'required | min: 3'
        ];
        $this->validate($request, $rule);
        $degree = Degree::find($id);
        $degree->degree_name = $request->input('degree_name');
        $degree->save();
        return redirect('/admin/degree');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Degree::find($id)->delete();
        return redirect('/admin/degree');
    }
}
