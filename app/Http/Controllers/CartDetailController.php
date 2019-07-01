<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetails;

class CartDetailController extends Controller
{
    //
    public function store(Request $request){

    	$cartDetail = new CartDetails;
    	$cartDetail->cart_id= auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

    	$notification='El producto se ha agreagado al carrito de compras exitosamente';
        return back()->with(compact('notification'));


    }

     public function destroy(Request $request){

    	$cartDetail = CartDetails::find($request->cart_detail_id);

        if($cartDetail->cart_id == auth()->user()->cart->id){  
            $cartDetail->delete();
        }

        $notification='El producto se ha eliminado del carrito de compras correctamente';
        return back()->with(compact('notification'));


    }
}
