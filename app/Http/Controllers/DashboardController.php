<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the view name matches your file name exactly
        // Based on your previous files, it seems to be 'dashboardsummery'
        return view('components.back-end.dashboardsummery');
    }
}
