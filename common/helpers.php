<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/6/2017
 * Time: 12:28 PM
 */

/**
 * Get ID by slug (a-b-c-ID)
 */
if (!function_exists('getIDBySlug')){
    /**
     * @param null $slug
     * @return bool | String
     */
    function getIDBySlug($slug = null){
        if ($slug == null){
            return false;
        }
        return explode('-',   $slug)[count(explode('-',   $slug)) -1 ];
    }
}