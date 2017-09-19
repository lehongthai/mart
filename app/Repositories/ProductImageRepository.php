<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 7/26/2017
 * Time: 10:05 PM
 */

namespace App\Repositories;


use App\Models\ProductImage;

class ProductImageRepository extends BaseRepository
{
    public function __construct(ProductImage $model)
    {
        parent::__construct($model);
    }

    public function deleteImageByProductID($productID){
        return $this->model->where('product_id', $productID)->delete();
    }

}