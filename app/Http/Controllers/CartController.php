<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CartController extends Controller
{
    //
    public function update(){
    	$client = auth()->user();
    	$cart = $client->cart;
    	$cart->status = 'Pending';
    	$cart->order_date = Carbon::now();
    	$cart->save();

    	$admins = User::where('admin',true)->get(); //usuarios admins
    	Mail:to($admins)->send(new NewOrder($client, $cart)); //

    	$notification = 'Tu pedido se ha registrado correctamente, te contactaremos pronto via email';
    	return back()->with(compact('notification'));
    }
}
