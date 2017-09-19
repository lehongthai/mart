<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['common_id', 'name', 'slug', 'category_id', 'user_id',
        'keywords', 'description', 'views', 'lang', 'content', 'desc'];

    public $timestamps = false;
}
