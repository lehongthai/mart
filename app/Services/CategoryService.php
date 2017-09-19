<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/5/2017
 * Time: 12:07 PM
 */

namespace App\Services;

use App\Models\Common;
use App\Repositories\CategoryRepository;
use App\Repositories\CommonRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryService extends BaseService
{
    public function __construct(CategoryRepository $repository)
    {
        parent::__construct($repository);
    }

    public function setData(Request $request)
    {
        $data = [
            'name' => $request->name_vn,
            'type' => 'category',
            'user_id' => Auth::user()->id,
            'sub_type' => $request->type
        ];

        $dataViet = $dataEnglish = [];
        if ($request->vietnam == 'vietnam'){
            $dataViet = $this->setDataViet($request);
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

    public function setDataViet(Request $request){
        $dataViet = [
            'name' => $request->name_vn,
            'slug' => $request->slug_vn,
            'keywords' => $request->keywords_vn,
            'description' => $request->description_vn,
            'type' => $request->type,
            'user_id' => Auth::user()->id,
            'lang' => 'vn'
        ];
        return $dataViet;
    }

    public function setDataEnglish(Request $request){
        $dataEnglish = [
            'name' => $request->name_en,
            'slug' => $request->slug_en,
            'keywords' => $request->keywords_en,
            'description' => $request->description_en,
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'lang' => 'en'
        ];

        return $dataEnglish;
    }

    public function storeCommon($data){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->store($data);
    }

    public function showListPage(){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->getCommonByCondition(['type' => 'category']);
    }

    public function findCategory($id=0){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->find($id);
    }

    public function updateByCondition(array $condition, array $data){
        return $this->repository->updateByCondition($condition, $data);
    }

    public function updateCommon($id, $data){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->update($id, $data);
    }

    public function destroyCategory($id)
    {
        $commonRepo = new CommonRepository(new Common());
        $commonRepo->destroy($id);
        $this->repository->deleteByCondition(['common_id' => $id]);
    }
}