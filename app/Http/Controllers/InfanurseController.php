<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfanurseController extends Controller
{
    public function index()
    {
        return view('infanurse2');
    }

    public function nurserent()
    {
        return view('nurserent');
    }
}
