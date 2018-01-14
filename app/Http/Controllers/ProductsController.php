<?php

namespace App\Http\Controllers;

use Session;
use Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Category::all()->count() == 0) {
            Session::flash('info', 'You must have atleast 1 category before create a product!');
            return redirect()->route('categories.create');
        }

        return view('admin.products.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'category_id' => 'required'
        ]);

        $product = new Product;

        $product_image = $request->image;
        
        $product_image_new_name = time() . $product_image->getClientOriginalName();

        $product_image->move('uploads/products', $product_image_new_name);

        $product->name = $request->name;

        $product->description = $request->description;

        $product->price = $request->price;

        $product->category_id = $request->category_id;

        $product->image = 'uploads/products/' . $product_image_new_name;

        $product->save();

        Session::flash('success', 'Product created');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit')->with('product', Product::find($id))
                                            ->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $product = Product::find($id);
        
        if ($request->hasFile('image')) {

            if (file_exists($product->image)) {
                unlink($product->image);
            }
            $product_image = $request->image;

            $product_image_new_name = time() . $product_image->getClientOriginalName();

            $product_image->move('uploads/products', $product_image_new_name);
            
            $product->image = 'uploads/products/' . $product_image_new_name;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;        
        $product->description = $request->description;

        $product->save();

        Session::flash('success', 'Product updated.');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        Session::flash('success', 'Product is trashed!');

        return redirect()->back();
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->get();

        return view('admin.products.trashed')->with('products', $products);
    }

    public function kill($id)
    {
        $product = Product::onlyTrashed()->find($id);

        if (file_exists($product->image)) {
            unlink($product->image);
        }

        foreach (Cart::content() as $cartItem) {
            if ($cartItem->id == $product->id) {
                Cart::remove($cartItem->rowId);
            }
        }

        $product->forceDelete();

        Session::flash('success', 'Product is deleted permantly!');

        return redirect()->back();
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);

        $product->restore();

        Session::flash('success', 'Product is restored!');

        return redirect()->route('products.index');
    }



    
}
