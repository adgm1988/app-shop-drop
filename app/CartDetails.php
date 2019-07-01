<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    //

    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
