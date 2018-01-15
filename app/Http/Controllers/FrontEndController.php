<?php

namespace App\Http\Controllers;

use App\Product;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')->with('products', Product::paginate(3))
                            ->with('settings', Setting::first())
                            ->with('categories', Category::all());
    }

    public function singleProduct($id)
    {
        return view('single')->with('product', Product::find($id))
                                ->with('settings', Setting::first())
                                ->with('categories', Category::all());             
    }

    public function error()
    {
        return view('error')->with('settings', Setting::first())
                            ->with('categories', Category::all());                            
    }
}
