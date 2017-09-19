<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/6/2017
 * Time: 9:15 PM
 */

namespace App\Repositories;


use App\Models\Setting;

class SettingRepository extends BaseRepository
{
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    public function getSettingByCondition(array $condition){
        return $this->model->where($condition)->get();
    }

    public function updateSetting(array $condition,array $data)
    {
        return $this->model->where($condition)->update($data);
    }
}