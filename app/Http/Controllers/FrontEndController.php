<?php

namespace App\Http\Controllers;

use App\Product;
use App\Setting;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')->with('products', Product::paginate(3))
                            ->with('settings', Setting::first());
    }

    public function singleProduct($id)
    {
        return view('single')->with('product', Product::find($id))
                                ->with('settings', Setting::first());
    }
}
