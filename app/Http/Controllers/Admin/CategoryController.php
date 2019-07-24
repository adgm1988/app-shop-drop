<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index(){
		$categories = Category::orderBy('name')->paginate(10);
		return view('admin.categories.index',compact('categories')); //listado			
	}	

	public function create(){

		return view('admin.categories.create'); //formulario	
	}

    public function store(Request $request){

    	//validar
    /**

Aqui quitamos las reglas de aqui y las vamos a poner en el modelo, es otra opcion.
    	$messages=[
    		'name.required'=>'Es indispensable seleccionar un nombre de la categori',
    		'name.min'=>'El nombre de la categoría debe ser mayor a 3 caracteres',
    		'description.required'=>'Es necesario proporcionar una descripcion general de la categoría',
    		'description.max'=>'El campo de descripcion tiene un limite de 200 caracteres',
    	];

    	$rules=[
    		'name'=>'required|min:3',
    		'description'=>'max:250',
    	];

**/
//aqui en vez de traer las variables como siempre lo hacemos de la parte de arriba, las pasamos al modelo para tenerlas juntas alla.
    	$this->validate($request, Category::$rules, Category::$messages);

		
/** Opcion tipica para llenado de base de datos asignando valores "mnaualmente"

		$category = new Category();
		$category->name = $request->input('name');
		$category->description = $request->input('description');
		$category->save();

	Opcion 2 de llenafdon con create, poniendo los valores del request
		Category::create([
			'name'=>'abc',
			'description'=>'otro'
		])

**/

//Esta opcion de store es de manera masiva, para esto en el modelo hay que poner los campos como fillable. los campos del formulario tienen que tener exactamente el mismo name que el campo de la tabla

		Category::create($request->all());


		return redirect('/admin/categories');
    }

    
    public function edit(Category $category){

    	// public function edit($id){ ---> esta es la manera normal


    	/**esta es la manera normal
    	$category = Category::find($id);
    	**/



    	return view('admin/categories/edit',compact('category'));

    }

    public function update(Request $request, Category $category){


/**

Aqui quitamos las reglas de aqui y las vamos a poner en el modelo, es otra opcion.
    	$messages=[
    		'name.required'=>'Es indispensable seleccionar un nombre de la categori',
    		'name.min'=>'El nombre de la categoría debe ser mayor a 3 caracteres',
    		'description.required'=>'Es necesario proporcionar una descripcion general de la categoría',
    		'description.max'=>'El campo de descripcion tiene un limite de 200 caracteres',
    	];

    	$rules=[
    		'name'=>'required|min:3',
    		'description'=>'max:250',
    	];

**/
		//aqui en vez de traer las variables como siempre lo hacemos de la parte de arriba, las pasamos al modelo para tenerlas juntas alla.
    	$this->validate($request, Category::$rules, Category::$messages);

    	//esta es una manera diferente mas corta porque pasas directo el parametro con el nombre del modelo, desde la ruta tiene que venir con el nombre del modelo.
    	$category->update($request->all());

		return redirect('/admin/categories');

    }

    public function destroy(category $category){
    	//esta forma sin el find y asi es porque en vez de recibir el id desde la ruta recibimos la categorya ya directa.
    	$category->delete();

    	return back();
    }
}
