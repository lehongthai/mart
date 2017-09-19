<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/4/2017
 * Time: 11:56 AM
 */

namespace App\Services;


use App\Models\Common;
use App\Repositories\CommonRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostService extends BaseService
{
    public function __construct(PostRepository $repository)
    {
        parent::__construct($repository);
    }

    public function showCategory(){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->getCommonByCondition(['type' => 'category', 'sub_type' => 'post']);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function setDataVietNam(Request $request)
    {
        return [
            'name' => $request->name_vn,
            'slug' => $request->slug_vn,
            'content' => $request->contents_vn,
            'category_id' => $request->cate_id,
            'description' => $request->description_vn,
            'keywords' => $request->keywords_vn,
            'desc' => $request->desc_vn,
            'user_id' => Auth::user()->id,
            'lang' => 'vn'
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function setDataEnglish(Request $request)
    {
        return [
            'name' => $request->name_en,
            'slug' => $request->slug_en,
            'content' => $request->contents_en,
            'description' => $request->description_en,
            'keywords' => $request->keywords_en,
            'category_id' => $request->cate_id,
            'desc' => $request->desc_en,
            'user_id' => Auth::user()->id,
            'lang' => 'en'
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function setData(Request $request)
    {
        $image_arr = explode('/', $request->image_link);
        $data = [
            'type' => 'post',
            'user_id' => Auth::user()->id,
            'name' => $request->name_vn,
            'category_id' => $request->cate_id,
            'altImage' => $request->altImage,
            'image_thumb' => '/public/uploads/_thumbs/Images/'.$image_arr[count($image_arr) - 1],
            'images' => $request->image_link,
        ];

        $dataViet = $dataEnglish = [];
        if ($request->vietnam == 'vietnam'){
            $dataViet = $this->setDataVietNam($request);
        }
        if ($request->english == 'english'){
            $dataEnglish = $this->setDataEnglish($request);
        }

        return [
            'dataDetail' =>  $data,
            'dataEnglish' => $dataEnglish,
            'dataViet' => $dataViet
        ];
    }

    public function storeCommon($data){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->store($data);
    }

    public function showListPage(){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->getCommonByCondition(['type' => 'post']);
    }

    public function findPost($id=0){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->find($id);
    }

    public function updateCommon($id, $data){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->update($id, $data);
    }

    public function updateByCondition(array $condition, array $data){
        return $this->repository->updateByCondition($condition, $data);
    }

    public function destroyPost($id)
    {
        $commonRepo = new CommonRepository(new Common());
        $commonRepo->destroy($id);
        $this->repository->deleteByCondition(['common_id' => $id]);
    }
}