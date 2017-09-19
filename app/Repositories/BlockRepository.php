<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 9/10/2017
 * Time: 10:27 PM
 */

namespace App\Repositories;


use App\Models\Block;

class BlockRepository extends BaseRepository
{
    public function __construct(Block $model)
    {
        parent::__construct($model);
    }

}