<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_id', 'name','slug','images','image_thumb','category_id',
        'price', 'old_price','description', 'keywords', 'lang', 'altImage', 'content', 'desc'];

    public function mutilImage(){
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }

    public function detail(){
        return $this->belongsToMany(ProductDetail::class);
    }

    public function user(){
        return $this->hasOne(User::class)->select('name');
    }

    public function category(){
        return $this->hasOne(Category::class)->select('name');
    }
}
