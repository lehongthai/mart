<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/9/2017
 * Time: 11:01 PM
 */

namespace App\Services;


use App\Models\Setting;
use App\Repositories\SettingRepository;

class WebService
{
    /**
     * Get seowWbsite
     *
     * @return mixed
     */
    private function getSeoWebsiteBySetting($lang){
        $settingRepo = new SettingRepository(new Setting());
        $condition = ['lang' => $lang, 'type' => 'seo'];
        return $settingRepo->getSettingByCondition($condition)->first();
    }

    /**
     * @param $detail
     * @param $lang
     * @return array
     */
    protected function getSeoForWeb($detail, $lang){
        $seo = $this->getSeoWebsiteBySetting($lang);
        return [
            'title' => (isset($detail->name)) ? $detail->name : $seo->name,
            'keywords' => (isset($detail->keywords)) ? $detail->keywords : $seo->keywords,
            'description' => (isset($detail->descriptions)) ? $detail->descriptions : $seo->description,
            'og-title' => (isset($detail->name)) ? $detail->name : $seo->name,
            'og-image' => (isset($detail->images)) ? $detail->images : $seo->images,
            'og-site_name' => $seo->site_name,
            'od-description' => (isset($detail->descriptions)) ? $detail->descriptions : $seo->description,
            'twitter-title' => (isset($detail->name)) ? $detail->name : $seo->name,
            'twitter-image' => (isset($detail->images)) ? $detail->images : $seo->images,
            'twitter-card' => (isset($detail->descriptions)) ? $detail->descriptions : $seo->description,
        ];
    }

}