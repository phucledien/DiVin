<?php

namespace App\Http\Controllers;
use Session;
use Cart;
use App\Order;
use Illuminate\Http\Request;


class OrdersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        return view('admin.orders.index')->with('orders', Order::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'address' => 'required',
            'number' => 'required'
        ]);

        $customer = new Order;

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->number = $request->number;        
        //$customer->products = $request->products; 

        $customer->save();

        //Session::flash('success', 'Product created');

        return redirect()->route('cart.checkout');
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
        //
        return view('admin.orders.edit')->with('customer', Order::find($id));
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
        //
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'number' => 'required'
        ]);

        $customer = Order::find($id);

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->number = $request->number;        


        $customer->save();

        Session::flash('success', 'Customer updated.');

        return redirect()->route('orders.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        Session::flash('success', 'Order is deleted!');

        return redirect()->back();
    }

    public function delivery($id)
    {
        $shipment = Order::find($id);

        $shipment->delivery = 1;

        $shipment->save();

        return redirect()->back();

    }
}
