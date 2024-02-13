<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageCongroller extends Controller
{
    function main ()
    {
        return view('index');
    }

    function shop ()
    {
        return view('shop');
    }

    function detail ()
    {
        return view('detail');
    }

    function checkout ()
    {
        return view('checkout');
    }

    function cart ()
    {
        return view('cart');
    }
}
