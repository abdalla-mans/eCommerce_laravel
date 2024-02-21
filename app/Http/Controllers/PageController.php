<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    function main()
    {
        $products = DB::table('products')->limit(8)->inRandomOrder()->get();
        return view('index', compact('products'));
    }

    function detail(string $id, Request $r)
    {
        $product = Product::where('id', $id)->first();

        if ($product != null) {

            $category = DB::table('categories')->where('id', $product->category_id)->first();

            return view('detail', compact('product', 'category'));
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
}
