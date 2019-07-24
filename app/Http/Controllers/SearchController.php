<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    //
    public function show(Request $request){


    	$query = $request->input('query');

    	$products = Product::where('name','like',"%$query%")->paginate(10);

    	if($products->count()==1){
    		$id = $products->first()->id;
    		return redirect("products/$id"); // 'products'.$id ---> con comills dobles si se peude poner variable adentro.
    	}else{
    		return view('search.show',compact('products','query'));
    	}
    }

    public function data(){
    	$products = Product::pluck('name');
    	return $products;
    }
}
