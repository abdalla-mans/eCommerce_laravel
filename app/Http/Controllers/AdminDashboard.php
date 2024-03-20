<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function main () {
        return view('dashboard.index');
    }
    public function products () {
        return view('dashboard.products');
    }
}
