<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    protected $fillable = ['name', 'user_id', 'type', 'sub_type', 'category_id','altImage', 'publish', 'images', 'image_thumb'];

    public function category(){
        return $this->hasOne(Category::class);
    }

    public function detail(){
        return $this->hasMany(Category::class);
    }

    public function detailPost(){
        return $this->hasMany(Post::class);
    }

    public function detailSlider(){
        return $this->hasMany(Slider::class);
    }

    public function detailBlock(){
        return $this->hasMany(Block::class);
    }
}
