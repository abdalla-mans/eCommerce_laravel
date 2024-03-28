<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // go to main dashboard
    public function main () {
        $auth_user = Auth::user();
        return view('dashboard.index', compact('auth_user'));
    }

    public function pagination_count () {
        echo 'test';
    }
}
