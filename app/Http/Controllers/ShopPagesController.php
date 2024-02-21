<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopPagesController extends Controller
{
    function __invoke(Request $r)
    {

        $category_bool =
            $r->has('sort_category') ?
            $this->validate_category_id($category_id = (int) $r->query('sort_category')) :
            false;

        /**
         * you have an query in your 'url' his name is "page_number"
         * 
         * - get "post_name"
         * - should be integer
         *      if it is string no problem because the (int) make it "0 integer"
         * - should be absolute
         * 
         * @return integer
         */

        $page_number = $r->query('page_number') ?? 0;

        $page_number = abs((int) ($page_number));

        if ($category_bool) {

            # get products count from database
            $count = DB::table('products')->where('category_id', $category_id)->count();
        } else {

            # get products count from database
            $count = DB::table('products')->count();
        }

        # the $page_number should be less than $count / 12 or = 1
        $page_number = $page_number > ceil($count / 12) ? 1 : $page_number;


        $offset_num = $page_number * 12;

        # get products offset $page_number
        if ($category_bool) {
            $products = DB::table('products')->where('category_id', $category_id)->limit(12)->offset($offset_num)->get();
        } else {
            $products = DB::table('products')->limit(12)->offset($offset_num)->get();
        }

        # get all categories where is not null
        $categories = DB::table('categories')->where('category_id', '!=', 'null')->get();

        # get all categories it is null
        $main_categories = DB::table('categories')->where('category_id')->get();

        return view('shop', get_defined_vars());
    }








    function validate_category_id(int $cat_id): bool
    {
        $bool = DB::table('categories')
            ->where('category_id', '<>', 'null')
            ->where('id', $cat_id)->count() > 0;

        return $bool;
    }
}
