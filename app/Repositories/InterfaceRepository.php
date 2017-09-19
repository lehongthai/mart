<?php
namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 7/25/2017
 * Time: 11:31 PM
 */
interface InterfaceRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @return mixed
     */
    public function all();
}