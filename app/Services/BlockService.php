<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 9/10/2017
 * Time: 10:28 PM
 */

namespace App\Services;


use App\Models\Common;
use App\Repositories\BlockRepository;
use App\Repositories\CommonRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockService extends BaseService
{
    public function __construct(BlockRepository $repository)
    {
        parent::__construct($repository);
    }

    public function showListPage(){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->getCommonByCondition(['type' => 'block']);
    }

    public function setDataVietNam(Request $request)
    {
        return [
            'name' => $request->name_vn,
            'intro' => $request->intro_vn,
            'link' => $request->link_vn,
            'description' => $request->description_vn,
            'keywords' => $request->keywords_vn,
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
            'intro' => $request->intro_en,
            'link' => $request->link_en,
            'description' => $request->description_en,
            'keywords' => $request->keywords_en,
            'lang' => 'en'
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function setData(Request $request)
    {
        $data = [
            'type' => 'block',
            'user_id' => Auth::user()->id,
            'name' => $request->name_vn,
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

    public function findBlock($id=0){
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