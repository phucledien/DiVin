<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::all());
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'name' => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->name = request('name');

        $category->save();

        Session::flash('success', 'Category created!');

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required|unique:categories'
        ]);

        $category = Category::find($id);

        $category->name = request('name');

        $category->save();

        Session::flash('success', 'Category updated!');

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        foreach ($category->products as $product) {
            $product->delete();
        }
        $category->delete();

        Session::flash('success', 'The category deleted!');

        return redirect()->back();
    }
}
