<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/4/2017
 * Time: 11:55 AM
 */

namespace App\Repositories;


use App\Models\Post;

class PostRepository extends BaseRepository
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function updateByCondition(array $condition, array $data){
        return $this->model->where($condition)->update($data);
    }

    public function deleteByCondition(array $condition){
        return $this->model->where($condition)->delete();
    }

    public function showListProductByCondition(array $condition, $limit = 1, $detail = false){
        $post = $this->model->leftJoin('commons', 'commons.id', '=', 'posts.common_id');
        if (!$detail){
            $post->select('commons.id as pid', 'posts.name', 'posts.slug', 'commons.images', 'commons.altImage', 'posts.desc', 'commons.created_at');
        }elseif ($detail){
            $post->select('commons.id as pid', 'commons.images', 'commons.altImage', 'posts.*');
        }
        return $post->where($condition)->paginate($limit);
    }

}