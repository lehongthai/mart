<?php
namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 7/25/2017
 * Time: 11:39 PM
 */
abstract class BaseRepository implements InterfaceRepository
{
    /**
     * @var Object Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }


    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        return $this->model->create($data)->id;
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->find($id);
        return $model->destroy($id);
    }

    public function all()
    {
        return $this->model->all();
    }
}