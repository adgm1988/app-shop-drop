<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\ProductImage;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        //
        //'image'=>'https://picsum.photos/id/'.$faker->numberBetween(1,999).'/'.$faker->numberBetween(150,350).'/'.$faker->numberBetween(150,350).'' ,
        'image'=>'https://picsum.photos/id/'.$faker->numberBetween(1,999).'/'.'250'.'/'.'250'.'' ,
        'product_id'=>$faker->numberBetween(1,100)
    ];
});
