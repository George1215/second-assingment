<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        return view("index", ['categories' => $categories, 'products' => $products]);
    }

    public function category($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();
        $category=Category::where('id', $id)->first();
        return view("category", ['categories' => $categories, 'products' => $products, 'category' => $category]);
    }


    public function search(Request $request)
    {
        $q = $request["q"];

        //find result
        $products = Product::where('name', 'LIKE', "%{$q}%")->get();
        return view("includes.search", ['products' => $products]);

    }
}