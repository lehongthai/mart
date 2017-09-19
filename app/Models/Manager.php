<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 9/13/2017
 * Time: 5:52 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'favicon', 'logo', 'images', 'facebook', 'google', 'twitter', 'email', 'phone', 'fanpage', 'lat', 'lng', 'site_name', 'address', 'intro'
    ];

    public $timestamps = false;
}