<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        if (!session('is_logged_in')) {
            return redirect('/login');
        }
        return view('dashboard');
    }
}
