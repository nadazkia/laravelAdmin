<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutsController extends Controller
{
    function index()
    {
        return view('user.index', []);
    }
}
