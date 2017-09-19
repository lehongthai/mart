<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/5/2017
 * Time: 9:16 PM
 */

namespace App\Services;


use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SliderRepository;
use Illuminate\Support\Facades\Lang;

class HomeService extends WebService
{
    private $lang = 'en';
    private $productRepo;
    private $postRepo;
    private $categoryRepo;

    public function __construct()
    {
        $this->lang = Lang::getLocale();
        $this->productRepo = new ProductRepository(new Product());
        $this->postRepo = new PostRepository(new Post());
        $this->categoryRepo = new CategoryRepository(new Category());
    }


    public function showDataForHomePage(){
        $sliderRepo = new SliderRepository(new Slider());
        $listSlider = $sliderRepo->getSliderByConditionForWebsite(['lang' => $this->lang]);
        $listBlock = [
            'sliderLeft' => $sliderRepo->getSliderByConditionForWebsite(['lang' => $this->lang, 'location' => 1], false, 'block')->first(),
            'betweenLeft' => $sliderRepo->getSliderByConditionForWebsite(['lang' => $this->lang, 'location' => 2], false, 'block')->first(),
            'betweenRight' => $sliderRepo->getSliderByConditionForWebsite(['lang' => $this->lang, 'location' => 3], false, 'block')->first(),
            'endLeft' => $sliderRepo->getSliderByConditionForWebsite(['lang' => $this->lang, 'location' => 4], false, 'block')->first(),
            'endRight' => $sliderRepo->getSliderByConditionForWebsite(['lang' => $this->lang, 'location' => 5], false, 'block')->first()
        ];

        $listProduct = $this->productRepo->getProductByCondition(['lang' => $this->lang, 'product_details.status' => 2]);
        $listProductSale = $this->productRepo->getProductByCondition(['lang' => $this->lang, 'product_details.status' => 4]);
        $listProductNew = $this->productRepo->getProductByCondition(['lang' => $this->lang, 'product_details.status' => 5]);
        $listPost = $this->postRepo->showListProductByCondition(['lang' => $this->lang]);

        return [
            'listSlider' => $listSlider,
            'listProduct' =>$listProduct,
            'listProductSale' => $listProductSale,
            'listProductNew' => $listProductNew,
            'listPost' => $listPost,
            'listBlock' => $listBlock,
            'seoWebsite' => $this->getSeoForWeb(null, $this->lang)
        ];
    }


    public function showDataForListProduct(array $condition=null, $id=0){
        $where = ['lang' => $this->lang];
        $condition = array_merge($where, $condition);
        $listProduct = $this->productRepo->getProductByCondition($condition, 3);
        $listProductSale = $this->productRepo->getProductByCondition(['lang' => $this->lang, 'product_details.status' => 4]);

        $conditionCate = ['commons.type' => 'category', 'commons.sub_type' => 'product', 'categories.lang' => $this->lang];
        $listCategory = $this->categoryRepo->listCategoryByCondition($conditionCate);
        $detailCate = $this->categoryRepo->getCategoryByCondition(['categories.common_id' => $id, 'categories.lang' => $this->lang]);

        return [
            'listProduct' => $listProduct,
            'listCategory' => $listCategory,
            'seoWebsite' => $this->getSeoForWeb($detailCate->first(), $this->lang),
            'listProductSale' => $listProductSale,
            'detailCate' => $detailCate->first()
        ];
    }

    public function showDataProductForDetail(array $condition){
        $where = ['lang' => $this->lang];
        $condition = array_merge($where, $condition);
        $detailProduct = $this->productRepo->getProductByCondition($condition, 1, true)->first();
        $conditionRelated = ['products.category_id' => $detailProduct->category_id];
        $conditionRelated = array_merge($where, $conditionRelated);
        $productRelated = $this->productRepo->getProductByCondition($conditionRelated, 4);
        $conditionCate = ['commons.type' => 'category', 'commons.sub_type' => 'product', 'categories.lang' => $this->lang];
        $listCategory = $this->categoryRepo->listCategoryByCondition($conditionCate);
        return [
            'detailProduct' => $detailProduct,
            'productRelated' => $productRelated,
            'seoWebsite' => $this->getSeoForWeb($detailProduct, $this->lang),
            'listCategory' => $listCategory
        ];
    }

    public function showDataBlogForBlogPage(array $condition, $id=0){
        $where = ['lang' => $this->lang];
        $condition = array_merge($where, $condition);
        $listPost = $this->postRepo->showListProductByCondition($condition, 1);
        $conditionCate = ['commons.type' => 'category', 'commons.sub_type' => 'post', 'categories.lang' => $this->lang];
        $listCategory = $this->categoryRepo->listCategoryByCondition($conditionCate);
        $detailCate = $this->categoryRepo->getCategoryByCondition(['categories.common_id' => $id, 'categories.lang' => $this->lang]);

        return [
            'listPost' => $listPost,
            'listCategory' => $listCategory,
            'seoWebsite' => $this->getSeoForWeb($detailCate, $this->lang)
        ];
    }

    public function showDataDetailPost(array $condition){
        $where = ['lang' => $this->lang];
        $condition = array_merge($where, $condition);
        $detailPost = $this->postRepo->showListProductByCondition($condition, 1, true)->first();
        $conditionCate = ['commons.type' => 'category', 'commons.sub_type' => 'post', 'categories.lang' => $this->lang];
        $listCategoryForPost = $this->categoryRepo->listCategoryByCondition($conditionCate);
        $listPost = $this->postRepo->showListProductByCondition($condition, 1);

        return [
            'detailPost' => $detailPost,
            'listCategory' => $listCategoryForPost,
            'seoWebsite' => $this->getSeoForWeb($detailPost, $this->lang),
            'listPost' => $listPost
        ];
    }

    public function showDataDetailSlider(array $condition){
        $sliderRepo = new SliderRepository(new Slider());
        $where = ['lang' => $this->lang];
        $condition = array_merge($where, $condition);
        $detailSlider = $sliderRepo->getSliderByConditionForWebsite($condition,true)->first();
        $conditionCate = ['commons.type' => 'category', 'commons.sub_type' => 'post', 'categories.lang' => $this->lang];
        $listCategoryForPost = $this->categoryRepo->listCategoryByCondition($conditionCate);
        return [
            'detailPost' => $detailSlider,
            'listCategory' => $listCategoryForPost,
            'seoWebsite' => $this->getSeoForWeb($detailSlider, $this->lang)
        ];
    }

    public function showSettingForWebsite(array $condition){
        $where = ['lang' => $this->lang];
        $settingRepo = new SettingRepository(new Setting());
        $condition = array_merge($condition, $where);
        $setting = $settingRepo->getSettingByCondition($condition)->first();

        $conditionCate = ['commons.type' => 'category', 'commons.sub_type' => 'product', 'categories.lang' => $this->lang];
        $listCategory = $this->categoryRepo->listCategoryByCondition($conditionCate);

        return [
            'listCategory' => $listCategory,
            'setting' => $setting,
            'seoWebsite' => $this->getSeoForWeb($setting, $this->lang)
        ];
    }

    public function searchProduct($product=null){
        if ($product == null) return false;
        return [
            'listProduct' => $this->productRepo->searchProduct($product, $this->lang),
            'seoWebsite' => $this->getSeoForWeb(null, $this->lang)
        ];
    }

    public function notFound(){
        $conditionCate = ['commons.type' => 'category', 'commons.sub_type' => 'post', 'categories.lang' => $this->lang];
        $listCategoryForPost = $this->categoryRepo->listCategoryByCondition($conditionCate);
        return [
            'seoWebsite' => $this->getSeoForWeb(null, $this->lang),
            'listCategory' => $listCategoryForPost
        ];
    }
}