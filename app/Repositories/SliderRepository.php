<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/5/2017
 * Time: 8:13 PM
 */

namespace App\Repositories;


use App\Models\Slider;

class SliderRepository extends BaseRepository
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

    public function updateByCondition(array $condition, array $data){
        return $this->model->where($condition)->update($data);
    }

    public function deleteByCondition(array $condition){
        return $this->model->where($condition)->delete();
    }

    public function getSliderByCondition(array $condition){
        return $this->model->where($condition)->get();
    }

    public function getSliderByConditionForWebsite(array $condition, $detail = false, $type = 'slider'){
        $slider = $this->model
            ->leftJoin('commons', 'commons.id', '=', 'sliders.common_id');
        if (!$detail){
            $slider->select('sliders.name', 'sliders.slug', 'sliders.desc', 'commons.id', 'commons.altImage', 'commons.images')->where(['commons.type' => $type, 'commons.publish' => 1]);
        }else{
            $slider->select('sliders.*', 'commons.id', 'commons.altImage', 'commons.images')->where(['commons.publish' => 1]);
        }
        return $slider->where($condition)->get();
    }
}