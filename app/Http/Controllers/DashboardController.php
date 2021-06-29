<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('backend.dashboard.userDashboard');
        } elseif (Auth::user()->hasRole('superadmin')) {
            return view('backend.dashboard.superadminDashboard');
        } elseif (Auth::user()->hasRole('admin')) {
            return view('backend.dashboard.adminDashboard');
        }
    }
}
