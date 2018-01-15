<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Order;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index')->with('products', Product::all())
                                    ->with('categories', Category::all())
                                    ->with('trashed', Product::onlyTrashed()->get())
                                    ->with('users', User::all())
                                    ->with('orders', Order::all());
    }


}
