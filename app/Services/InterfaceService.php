<?php

/**
 * Created by PhpStorm.
 * User: thai
 * Date: 7/25/2017
 * Time: 11:43 PM
 */
namespace App\Services;
use Illuminate\Http\Request;

interface InterfaceService
{
    public function find($id);
    public function store($data);
    public function setData(Request $request);
    public function update($id, $data);
    public function destroy($id);
    public function all();
}