<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 7/26/2017
 * Time: 10:05 PM
 */

namespace App\Services;


use App\Repositories\ProductImageRepository;

class ProductImageService extends BaseService
{
    public function __construct(ProductImageRepository $repository)
    {
        parent::__construct($repository);
    }

    public function deleteImageByProductID($productID){
        return $this->repository->deleteImageByProductID($productID);
    }

}