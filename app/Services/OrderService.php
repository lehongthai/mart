<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/10/2017
 * Time: 11:27 PM
 */

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService extends BaseService
{
    public function __construct(OrderRepository $repository)
    {
        parent::__construct($repository);
    }

}