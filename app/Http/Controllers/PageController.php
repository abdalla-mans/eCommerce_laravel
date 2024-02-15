<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    function main()
    {
        $products = DB::table('products')->get();
        return view('index', compact('products'));
    }

    function shop()
    {
        return view('shop');
    }

    function detail(string $id, Request $r)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if ($product != null) {
            return view('detail', compact('product'));
        } else {
            return back();
        }
    }

    function checkout()
    {
        return view('checkout');
    }

    function cart()
    {
        return view('cart');
    }

    function login()
    {
        return view('logs.login');
    }

    function logout()
    {
        return view('logs.logout');
    }

    function register()
    {
        return view('logs.register');
    }
}
