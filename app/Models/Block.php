<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 9/10/2017
 * Time: 10:24 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
      'common_id', 'lang', 'name', 'intro', 'link', 'keywords', 'description'
    ];

    public $timestamps = false;
}