<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/6/2017
 * Time: 9:16 PM
 */

namespace App\Services;


use App\Repositories\SettingRepository;
use Illuminate\Http\Request;

class SettingService extends BaseService
{
    public function __construct(SettingRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getSettingByCondition(array $condition){
        return $this->repository->getSettingByCondition($condition);
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
            'images' => $request->image_link,
            'altImage' => $request->altImage,
        ];

        $dataViet = $dataEnglish = [];
        if ($request->vietnam == 'vietnam') {
            $dataViet = array_merge($data, $this->setDataVietNam($request));
        }
        if ($request->english == 'english') {
            $dataEnglish = array_merge($data, $this->setDataEnglish($request));
        }

        return [
            'dataEnglish' => $dataEnglish,
            'dataViet' => $dataViet
        ];
    }

    public function updateSetting(array $condition, array $data){
        return $this->repository->updateSetting($condition, $data);
    }
}