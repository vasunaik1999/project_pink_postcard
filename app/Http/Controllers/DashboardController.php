<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('user')) {
                return view('frontend.home');
            } elseif (Auth::user()->hasRole('superadmin')) {
                return view('backend.dashboard.superadminDashboard');
            } elseif (Auth::user()->hasRole('admin')) {
                return view('backend.dashboard.adminDashboard');
            }
        } else {
            return view('frontend.home');
        }
    }
}
