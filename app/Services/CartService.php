<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 8/6/2017
 * Time: 3:41 PM
 */

namespace App\Services;

use App\Mail\CheckoutAdminEmail;
use App\Mail\CheckoutEmail;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Cart, Mail;
class CartService extends WebService
{
    /**
     * @var string
     */
    private $lang;

    /**
     * @var ProductRepository
     */
    private $productRepo;

    /**
     * CartService constructor.
     */
    public function __construct()
    {
        $this->lang = Lang::getLocale();
        $this->productRepo = new ProductRepository(new Product());
    }

    /**
     * @param $productID
     * @param $qty
     * @return string
     */
    public function buyProduct($productID, $qty){
        $qty = ($qty == null) ? 1 : $qty;
        $condition = [
            'products.lang' => $this->lang,
            'products.product_id' => $productID
        ];
        $productCart = $this->productRepo->getProductByCondition($condition, 1)->first();
        Cart::add(
            [
                'id' => $productID,
                'name' => $productCart->name,
                'price' => $productCart->price,
                'qty' => $qty,
                'slug' => $productCart->slug,
                'options' => [
                    'images' => $productCart->images
                ]
            ]
        );

        return $this->showCart();
    }

    /**
     * @return string
     */
    public function showCart(){
        $listCart = Cart::content();
        $html = '';
        if (!empty($listCart)){
            $html .= '<a class="shop-link" title="View my shopping cart">
						<i class="fa fa-shopping-cart cart-icon"></i>
						<b>' . trans('app.MyCart') . '</b>
						<span class="ajax-cart-quantity">' . Cart::count() . '</span>
					</a>
					<div class="shipping-cart-overly">';
            foreach($listCart as $k => $cart){
                $html .= '<div class="shipping-item">
							<div class="shipping-item-image">
								<a><img src="' . $cart->options['images'] . '" alt="shopping image" /></a>
							</div>
							<div class="shipping-item-text">
								<span>' . $cart->qty . ' <span class="pro-quan-x">x</span> <a class="pro-cat">' . $cart->name . '</a></span>
								<p>' . number_format($cart->price,0,',','.') . 'VNĐ</p>
							</div>
						</div>';
            }
            $html .= '<div class="shipping-total-bill">
							<div class="cart-prices">
								<span class="shipping-cost">' . Cart::count() . '</span>
								<span>' . trans('app.Quantity') . '</span>
							</div>
							<div class="total-shipping-prices">
								<span class="shipping-total">' . Cart::subtotal(0,',','.') . 'VNĐ </span>
								<span>' . trans('app.Subtotal') . '</span>
							</div>										
						</div>
						<div class="shipping-checkout-btn">
							<a href="checkout">' . trans('app.Checkout') . '<i class="fa fa-chevron-right"></i></a>
						</div>
					</div>';
        }else{
            $html .= '<a class="shop-link" title="View my shopping cart">
						<i class="fa fa-shopping-cart cart-icon"></i>
						<b>' . trans('app.MyCart') . '</b>
						<span class="ajax-cart-quantity">0</span>
					</a>
					<div class="shipping-cart-overly">';
            $html .= '<div class="shipping-total-bill">
							<div class="cart-prices">
								<span class="shipping-cost">0</span>
								<span>' . trans('app.Quantity') . '</span>
							</div>
							<div class="total-shipping-prices">
								<span class="shipping-total">0 VNĐ </span>
								<span>' . trans('app.Subtotal') . '</span>
							</div>										
						</div>
						<div class="shipping-checkout-btn">
							<a href="checkout">' . trans('app.Checkout') . '<i class="fa fa-chevron-right"></i></a>
						</div>
					</div>';
        }

        return $html;
    }

    /**
     * @return mixed
     */
    public function getListCart(){
        return Cart::content();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteCart($id){
        return Cart::remove($id);
    }

    /**
     * @param $id
     * @param $qty
     * @return mixed
     */
    public function updateCart($id, $qty){
        return Cart::update($id, $qty);
    }

    /**
     * @param Request $request
     */
    public function checkout(Request $request){
        $listCart = $this->getListCart();
        $orderRepo = new OrderRepository(new Order());
        $orderRepo->store($this->setDataOrder($listCart, $request));
        Mail::send(new CheckoutEmail($listCart, $request));
        Mail::send(new CheckoutAdminEmail($request));
        $this->destroyCart();
    }

    /**
     * @return array|bool
     */
    public function showDataForCheckoutPage(){
        if(!empty($this->getListCart())){
            return [
                'seoWebsite' => $this->getSeoForWeb(null, $this->lang)
            ];
        }
        return false;
    }

    /**
     * @param $listCart
     * @param $request
     * @return array
     */
    private function setDataOrder($listCart, $request){
        $productArr = [];
        foreach ($listCart as $cart) {
            array_push($productArr, ['product' => $cart->id, 'qty' => $cart->qty]);
        }
        return [
            'product' => json_encode($productArr),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ];
    }

    /**
     * @return mixed
     */
    private function destroyCart(){
        return Cart::destroy();
    }
}