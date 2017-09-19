<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['name', 'slug', 'type', 'lang', 'content', 'user_id', 'keywords', 'description', 'desc', 'images'];

    public $timestamps = false;
}
