<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function privada()
    {
        return view('dashboard.home');
    }
}
