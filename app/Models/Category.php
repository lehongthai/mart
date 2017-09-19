<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'type', 'lang', 'keywords', 'description', 'user_id', 'common_id'];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
