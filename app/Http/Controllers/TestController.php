<?php

namespace App\Http\Controllers;

use App\DepartmentSubject;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function test()
    {
        $groups = DepartmentSubject::Where('department_id', 1)->groupBy('group')->lists('group');
        foreach ($groups as $group) {
            ${$group} =  $department_subjects = DepartmentSubject::Where('department_id' , 1)->where('group', $group)->get();
        }
        $data = [];
        foreach ($groups as $group) {
            $data[$group] = ${$group};
        }
        $data['groups'] = $groups;
        return view('test', $data);
    }
}
