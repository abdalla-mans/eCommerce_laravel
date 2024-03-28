<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function detail(string $id, Request $r)
    {
        $product = Product::with(['images'])->where('id', $id)->first();
        // $product = Product::where('id', $id)->first();

        if ($product != null) {

            $category = Category::where('id', $product->category_id)->first();

            return view('detail', compact('product', 'category'));
        } else {
            return back();
        }
    }

    public function shop (Request $request) {

        if ($request->has('sort_category')) {

            // get category id
            $category_id = $request->sort_category;
            
            $products = Product::where('category_id', $category_id)->paginate();
            // $products = Product::with(['images'])->where('category_id', $category_id)->paginate();

            // chick category if exist
            if ($products->count() > 0) {

                $categories = Category::all();
                return view('shop', compact('products', 'categories'));

            } else {
                return back();
            }

        } else {

            $products = Product::paginate();
            $categories = Category::all();
    
            return view('shop', compact('products', 'categories'));
        }

    }
}
