<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function pay()
    {

        Stripe::setApiKey("sk_test_8vB4Rp11h35HFlNIbh98TfWK");

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'DeVin shop',
            'source' => request()->stripeToken
        ]);

        Session::flash('success', 'Purchase successfully, wait for our email.');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');
    }
}
