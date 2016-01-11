<?php

namespace App\Http\Controllers;

use App\Degree;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendLayoutController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function degree_program()
    {
        $degrees = Degree::all();
        return view('frontend.academic')->with('degrees', $degrees);
    }
}
