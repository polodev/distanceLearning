<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.subject.subject', compact('subjects'));
    }

    public function search(Request $request)
    {
        $search = $request->input('subject_search');
        $subjects = Subject::where('subject_name', 'like', "%$search%")->orderBy('created_at', 'desc')->get();
        return view('admin.subject.subject_search', compact('subjects', 'search'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.subject_create');
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
            'subject_name' => 'required | min:3',
            'subject_description' => 'required | min:3',
            'subject_credit' => 'required'
        ];
        $this->validate($request, $rule);
        $subject = new Subject($request->all());
        $subject->save();
        return redirect('admin/subject/create')->with('status', 'Subject saves successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        return view('admin.subject.subject_info', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('admin.subject.subject_edit', compact('subject'));
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
        $subject = Subject::find($id);
        $rule = [
            'subject_name' => 'required | min:3',
            'subject_credit' => 'required',
            'subject_description' => 'required | min:5'
        ];
        $this->validate($request, $rule);
        $subject->subject_name = $request->get('subject_name');
        $subject->subject_description = $request->get('subject_description');
        $subject->subject_credit = $request->get('subject_credit');
        $subject->save();
        return redirect('/admin/subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();
        return redirect('admin/subject');
    }
}
