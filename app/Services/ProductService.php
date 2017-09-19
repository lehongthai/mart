<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 7/25/2017
 * Time: 11:44 PM
 */

namespace App\Services;

use App\Models\Common;
use App\Models\ProductImage;
use App\Models\ProductDetail;
use App\Repositories\CommonRepository;
use App\Repositories\ProductImageRepository;
use App\Repositories\ProductDetailRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductService extends BaseService
{
    public function __construct(ProductRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return mixed
     */
    public function getAllProduct(){
        return $this->repository->getAllProduct();
    }

    /**
     * @param $productId
     * @param $request
     */
    public function storeImageProductDetail($productId, $request){
        if (!empty($request->detailImg)){
            $data = ['product_id' => $productId];
            foreach ($request->detailImg as $item){
                if ($item != null){
                    $productImageService = new ProductImageService(new ProductImageRepository(new ProductImage()));
                    $image_arr = explode('/', $item);
                    $data['image'] = $item;
                    $data['image_thumb'] = '/uploads/_thumbs/Images/'.$image_arr[count($image_arr) - 1];
                    $productImageService->store($data);
                }
            }
        }
    }

    /**
     * @param $listId
     * @param $request
     * @param $productID
     */
    public function updateImageProductDetail($listId, $request, $productID){
        if (!empty($request->detailImg)){
            $data = ['product_id' => $productID];
            foreach ($request->detailImg as $k => $item){
                $productImageService = new ProductImageService(new ProductImageRepository(new ProductImage()));
                if ($item != null && !empty($listId[$k])){
                    $image_arr = explode('/', $item);
                    $data['image'] = $item;
                    $data['image_thumb'] = '/public/uploads/_thumbs/Images/'.$image_arr[count($image_arr) - 1];
                    $productImageService->update($listId[$k]->id, $data);
                } elseif ($item != null && empty($listId[$k])){
                    $image_arr = explode('/', $item);
                    $data['image'] = $item;
                    $data['image_thumb'] = '/public/uploads/_thumbs/Images/'.$image_arr[count($image_arr) - 1];
                    $productImageService->store($data);
                }
            }
        }
    }

    /**
     * Set data for create product and update product
     *
     * @param Request $request
     * @return array
     */
    public function setDataVietNam(Request $request, $image_arr)
    {
        return [
            'name' => $request->name_vn,
            'slug' => $request->slug_vn,
            'content' => $request->contents_vn,
            'images' => $request->image_link,
            'altImage' => $request->altImage,
            'image_thumb' => '/public/uploads/_thumbs/Images/'.$image_arr[count($image_arr) - 1],
            'category_id' => $request->cate_id,
            'desc' => $request->desc_vn,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'description' => $request->description_vn,
            'keywords' => $request->keywords_vn,
            'lang' => 'vn'
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function setDataEnglish(Request $request, $image_arr)
    {
        return [
            'name' => $request->name_en,
            'slug' => $request->slug_en,
            'content' => $request->contents_en,
            'description' => $request->description_en,
            'keywords' => $request->keywords_en,
            'desc' => $request->desc_en,
            'images' => $request->image_link,
            'altImage' => $request->altImage,
            'image_thumb' => '/public/uploads/_thumbs/Images/'.$image_arr[count($image_arr) - 1],
            'category_id' => $request->cate_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
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
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'quantity' => $request->quantity,
            'note' => $request->note,
            'name' => $request->name_vn,
            'price' => $request->price,
        ];

        $dataViet = $dataEnglish = [];
        if ($request->vietnam == 'vietnam'){
            $dataViet = $this->setDataVietNam($request, $image_arr);
        }
        if ($request->english == 'english'){
            $dataEnglish = $this->setDataEnglish($request, $image_arr);
        }

        return [
            'dataDetail' =>  $data,
            'dataEnglish' => $dataEnglish,
            'dataViet' => $dataViet
        ];

    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $productImageService = new ProductImageService(new ProductImageRepository(new ProductImage()));
        $productImageService->deleteImageByProductID($id);
        $productDetail = new ProductDetailRepository(new ProductDetail());
        $productDetail->deleteProductDetailByProductID($id);
        parent::destroy($id);
        return true;
    }

    public function storeProductDetail($data){
        $productDetail = new ProductDetailRepository(new ProductDetail());
        return $productDetail->store($data);
    }

    public function updateProductDetail($id, $data){
        $productDetail = new ProductDetailRepository(new ProductDetail());
        return $productDetail->update($id, $data);
    }

    public function find($id)
    {
        $productDetail = new ProductDetailRepository(new ProductDetail());
        return $productDetail->find($id);
    }

    public function updateByCondition(array $condition, array $data){
        return $this->repository->updateByCondition($condition, $data);
    }

    public function showCategory(){
        $commonRepo = new CommonRepository(new Common());
        return $commonRepo->getCommonByCondition(['type' => 'category', 'sub_type' => 'product']);
    }

}