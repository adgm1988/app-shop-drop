<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
	public function index(){
		$products = Product::paginate(10);
		return view('admin.products.index',compact('products')); //listado			
	}	

	public function create(){

		return view('admin.products.create'); //formulario	
	}

    public function store(Request $request){

    	//validar
    	$messages=[
    		'price.required'=>'El precio es un campo requerido',
    		'price.min'=>'El precio tiene que ser un valor positivo',
    		'name.required'=>'Es indispensable seleccionar un nombre de producto',
    		'name.min'=>'El nombre del producto debe ser mayor a 3 caracteres',
    		'description.required'=>'Es necesario proporcionar una descripcion general del producto',
    		'description.max'=>'El campo de descripcion tiene un limite de 200 caracteres',
    	];

    	$rules=[
    		'name'=>'required|min:3',
    		'description'=>'required|max:200',
    		'price'=>'required|numeric|min:0',
    	];

    	$this->validate($request, $rules, $messages);

		$product = new Product();
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->description = $request->input('description');
		$product->long_description = $request->input('long_description');
		$product->save();

		return redirect('/admin/products');
    }

    public function edit($id){
    	$product = Product::find($id);
    	return view('admin/products/edit',compact('product'));
    }

    public function update(Request $request, $id){

    	$messages=[
    		'price.required'=>'El precio es un campo requerido',
    		'price.min'=>'El precio tiene que ser un valor positivo',
    		'name.required'=>'Es indispensable seleccionar un nombre de producto',
    		'name.min'=>'El nombre del producto debe ser mayor a 3 caracteres',
    		'description.required'=>'Es necesario proporcionar una descripcion general del producto',
    		'description.max'=>'El campo de descripcion tiene un limite de 200 caracteres',
    	];

    	$rules=[
    		'name'=>'required|min:3',
    		'description'=>'required|max:200',
    		'price'=>'required|numeric|min:0',
    	];

    	$this->validate($request, $rules, $messages);

    	$product = Product::find($id);
		$product->name = $request->input('name');
		$product->price = $request->input('price');
		$product->description = $request->input('description');
		$product->long_description = $request->input('long_description');

		$product->save();

		return redirect('/admin/products');

    }

    public function destroy($id){
    	
    	$product = Product::find($id);
    	$product->delete();

    	return back();
    }
}
