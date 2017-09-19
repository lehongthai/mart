<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 7/25/2017
 * Time: 11:42 PM
 */

namespace App\Repositories;


use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function getAllProduct(){
        return DB::table('products')
            ->distinct()
            ->select('categories.name as cName', 'products.product_id', 'product_details.*')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('product_details', 'product_details.id', '=', 'products.product_id')
            ->get();
    }

    public function destroy($id)
    {
        return $this->model->where('product_id', $id)->delete();
    }

    public function find($id)
    {
        return $this->model->where('product_id', $id)->first();
    }

    /**
     * @param array $condition
     * @param array $data
     * @return mixed
     */
    public function updateByCondition(array $condition, array $data){
        return $this->model->where($condition)->update($data);
    }

    /**
     * @param array $condition
     * @param int $limit
     * @param bool $detail
     * @return mixed
     */
    public function getProductByCondition(array $condition, $limit = 10, $detail = false){
        $product = $this->model
                    ->leftJoin('product_details', 'product_details.id', '=', 'products.product_id');
        if (!$detail){
            $product->select('product_details.id as pid','products.price','products.name','products.slug','products.images','products.altImage','product_details.status','products.desc');
        }elseif($detail){
            $product->select('product_details.id as pid', 'products.*');
        }
        return $product->where($condition)->paginate($limit);
    }

    /**
     * @param null $product
     * @param string $lang
     * @return mixed
     */
    public function searchProduct($product=null, $lang = 'en', $limit = 10){
        return $this->model
            ->leftJoin('product_details', 'product_details.id', '=', 'products.product_id')
            ->select('product_details.id as pid','products.price','products.name','products.slug','products.images','products.altImage','product_details.status','products.desc')
            ->where('products.name', 'like', '%' . $product . '%')
            ->where('products.lang', $lang)
            ->paginate($limit);
    }
}