<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/5/2017
 * Time: 11:52 AM
 */

namespace App\Repositories;


use App\Models\Common;

class CommonRepository extends BaseRepository
{
    public function __construct(Common $model)
    {
        parent::__construct($model);
    }

    public function getCommonByCondition($condition=null){
        return $this->model->where($condition)->get();
    }

}