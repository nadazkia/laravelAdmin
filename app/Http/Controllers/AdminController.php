<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('admin');
    }

    function operator()
    {
        $title = 'Operator Page';
        return view('admin', compact('title'));
    }

    function keuangan()
    {
        $title = 'Keuangan Page';
        return view('admin', compact('title'));
    }

    function marketing()
    {
        $title = 'Marketing Page';
        return view('admin', compact('title'));
    }
}
