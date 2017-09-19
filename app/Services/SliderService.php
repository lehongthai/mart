<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/5/2017
 * Time: 8:14 PM
 */

namespace App\Services;

use App\Models\Common;
use App\Repositories\CommonRepository;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderService extends BaseService
{
    public function __construct(SliderRepository $repository)
    {
        parent::__construct($repository);
    }

    public function showListPage($condition = 'slider'){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->getCommonByCondition(['type' => $condition]);
    }

    public function setDataVietNam(Request $request)
    {
        return [
            'name' => $request->name_vn,
            'slug' => $request->slug_vn,
            'content' => $request->contents_vn,
            'desc' => $request->desc_vn,
            'description' => $request->description_vn,
            'keywords' => $request->keywords_vn,
            'location' => $request->location,
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
            'desc' => $request->desc_en,
            'location' => $request->location,
            'lang' => 'en'
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function setData(Request $request, $type = 'slider')
    {
        $data = [
            'type' => $type,
            'user_id' => Auth::user()->id,
            'name' => $request->name_vn,
            'images' => $request->image_link,
            'altImage' => $request->altImage,
            'publish' => $request->publish
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

    public function findSlider($id=0){
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


    public function destroyCategory($id)
    {
        $commonRepo = new CommonRepository(new Common());
        $commonRepo->destroy($id);
        $this->repository->deleteByCondition(['common_id' => $id]);
    }
}