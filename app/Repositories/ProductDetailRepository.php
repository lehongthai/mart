<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 7/28/2017
 * Time: 11:01 AM
 */

namespace App\Repositories;


use App\Models\ProductDetail;

class ProductDetailRepository extends BaseRepository
{
    public function __construct(ProductDetail $productDetail)
    {
        parent::__construct($productDetail);
    }

    public function deleteProductDetailByProductID($productID){
        return $this->model->where('id', $productID)->delete();
    }
}