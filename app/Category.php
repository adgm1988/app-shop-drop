<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Aqui agregamos los mensajes de validacion y las reglas dentro del modelo en vez de en lso controladores, asi es mas ordenado.

	public static $messages=[
		'name.required'=>'Es indispensable seleccionar un nombre de la categori',
		'name.min'=>'El nombre de la categoría debe ser mayor a 3 caracteres',
		'description.required'=>'Es necesario proporcionar una descripcion general de la categoría',
		'description.max'=>'El campo de descripcion tiene un limite de 200 caracteres',
		];

	public static $rules=[
		'name'=>'required|min:3',
		'description'=>'max:250',
		];

    protected $fillable= ['name','description']; //esto es para poder llenar de manera masiva los datos.
    //$category->products
    public function products(){
    	return $this->hasMany(Product::class);
    }

    public function getfeaturedImageUrlAttribute(){
    	if($this->image)
    		return '/images/categories/'.$this->image;
    	
    	$firstProduct = $this->products()->first();

    	if($firstProduct)
    		return $firstProduct->featured_image_url;
    	return '/images/not-available.jpg';

	    
    }


}
