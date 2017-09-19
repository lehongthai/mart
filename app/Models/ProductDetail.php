<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = ['status','user_id', 'quantity','note', 'name', 'price'];

    public function mutilImage(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function detail(){
        return $this->hasMany(Product::class, 'product_id');
    }
}
