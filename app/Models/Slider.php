<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['common_id', 'name', 'slug', 'desc', 'content', 'keywords', 'description', 'lang', 'location'];
}
