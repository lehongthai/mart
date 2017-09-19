<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/5/2017
 * Time: 12:07 PM
 */

namespace App\Repositories;


use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function updateByCondition(array $condition, array $data){
        return $this->model->where($condition)->update($data);
    }

    public function deleteByCondition(array $condition){
        return $this->model->where($condition)->delete();
    }

    public function getCategoryByCondition(array $condition){
        return $this->model->where($condition)->get();
    }

    public function listCategoryByCondition(array $condition, $detail = false){
        $category = $this->model->leftJoin('commons', 'commons.id', '=', 'categories.common_id')
            ->where($condition);
        if (!$detail){
            $category->select('commons.id as cid', 'categories.name', 'categories.slug');
        }else{
            $category->select('commons.id as cid', 'categories.*');
        }
        return $category->get();
    }
}