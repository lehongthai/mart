<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/6/2017
 * Time: 4:18 PM
 */

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;
class MasterController extends Controller
{
    public function __construct($service)
    {
        View::share([
            'lang' => Lang::getLocale(),
            'html' => $this->getCart()
        ]);
    }

    private function getCart(){
        $cart = new CartService();
        return $cart->showCart();
    }
}