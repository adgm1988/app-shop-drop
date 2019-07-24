<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        /* PARA CREARLAS DE MANERA INDEPENDINETE

        factory(Category::class,5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class,200)->create();
        */

        //PARA CREARLAS DE MANERA REALCIONADA
        $categories = factory(Category::class,6)->create();

        $categories->each(function($cat){
            //hacemos 5 productos y luego los guardamos adentro de la categoria
            $prod =  factory(Product::class, 5)->make(); 
            $cat->products()->saveMany($prod);

            //aqui creo 5 imagenes y se las pongo a esos productos que cree arriba
            $prod->each(function ($prod){
                $img = factory(ProductImage::class,3)->make();
                $prod->images()->saveMany($img);
            });
        });
    }
}
