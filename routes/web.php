<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontEndController@index')->name('index');

Route::get('product/{id}', 'FrontEndController@singleProduct')->name('product.single');

Route::post('cart/add', 'ShoppingController@add_to_cart')->name('cart.add');

Route::get('cart/rapid/add/{id}', 'ShoppingController@rapid_add')->name('cart.rapid.add');

Route::get('cart', 'ShoppingController@cart')->name('cart');

Route::get('cart/delete/{id}', 'ShoppingController@cart_delete')->name('cart.delete');

Route::get('cart/incr/{id}/{qty}', 'ShoppingController@cart_incr')->name('cart.incr');

Route::get('cart/decr/{id}/{qty}', 'ShoppingController@cart_decr')->name('cart.decr');

Route::get('cart/checkout', 'CheckoutController@index')->name('cart.checkout');

Route::post('cart/checkout', 'CheckoutController@pay')->name('cart.checkout');

Route::get('results', function() {
    $query = request('query');
    
    $products = App\Product::where('name', 'like' ,'%' . $query . '%')->paginate(3);

    return view('results')->with('products', $products)
                            ->with('query', $query)
                            ->with('settings', App\Setting::first());
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('dashboard', 'HomeController@index')->name('home');

    Route::resource('products', 'ProductsController');
    Route::get('trashed', 'ProductsController@trashed')->name('products.trashed');
    Route::delete('trashed/{id}', 'ProductsController@kill')->name('products.kill');
    Route::get('trashed/{id}', 'ProductsController@restore')->name('products.restore');

    Route::resource('categories', 'CategoriesController');

    Route::get('settings', 'SettingsController@index')->name('setting');

    Route::put('settings', 'SettingsController@update')->name('setting.update');
});

Route::get('/error', 'FrontEndController@error')->name('error');
