<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    //
    public function index($id){

    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured','desc')->get(); //si el 'images" no tiene parentesis no funciona'

    	return view('admin.products.images.index',compact('product','images'));
    }

    public function store(Request $request, $id){

        //crear y guardar el archivo en nuetor proyecto
        $file = $request->file('photo');
        $path = public_path().'/images/products';
        $fileName = uniqid().$file->getClientOriginalName();
        $moved = $file->move($path,$fileName);


        //crear el registro en la tabla de productos
        if($moved){ 
            $productImage= new ProductImage();
            $productImage->image= $fileName;
            //$productImag->featured=0; no se tiene que poner porque por default le pusimos 0   
            $productImage->Product_id=$id;
            $productImage->save();//insert en base de datos
        }
        return back();


    }

    public function destroy($id){
        //elminar el archivo

        //si se elimino el archivo eliminamos el registro en la tabla
        $productImage = ProductImage::find($id);
        if(substr($productImage->image,0,4)==="http"){  
            $deleted = true; //eliminada porque nunca fue archivo
        }
        else{
            $fullPath = public_path().'/images/products/'.$productImage->image;
            $deleted = File::delete($fullPath);
        }

        if($deleted){
            $productImage->delete();
        }

        return back();
    }

    public function select($id,$image){
        
        ProductImage::where('product_id',$id)->update([
            'featured'=>false
        ]);


        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();
        return back();
    }
}
