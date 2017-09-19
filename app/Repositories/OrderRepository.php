<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/10/2017
 * Time: 11:26 PM
 */

namespace App\Repositories;


use App\Models\Order;

class OrderRepository extends BaseRepository
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

}