<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Services\CartService;
use Request;


class CartController extends MasterController
{
    /**
     * @var CartService
     */
    private $cartService;

    /**
     * CartController constructor.
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        parent::__construct($cartService);
        $this->cartService = $cartService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lists(){
        $listCart = $this->cartService->getListCart();
        return view('frontend.pages.cart', compact('listCart'));
    }

    /**
     * @return $this
     */
    public function checkout(){
        $dataResponse = $this->cartService->showDataForCheckoutPage();
        if (!$dataResponse) return redirect('/');
        return view('frontend.pages.checkout')->with($dataResponse);
    }

    /**
     * @param CheckoutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCheckout(CheckoutRequest $request){
        $this->cartService->checkout($request);
        $message = ['level' => 'success', 'flash_message' =>trans('app.CheckoutSuccess')];
        return redirect('cart')->with($message);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function orderRecieved(){
        return view('frontend.pages.order-recieved');
    }

    /**
     * @param $id
     */
    public function buyProduct($id){
        if (Request::ajax()){
            $qty = Request::input('qty');
            $html = $this->cartService->buyProduct($id, $qty);
            echo $html;
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCart($id){
        $this->cartService->deleteCart($id);
        return redirect()->route('cart.list');
    }

    /**
     * @param $id
     */
    public function updateCart($id){
        if (Request::ajax()) {
            $qty = (int)Request::get('qty');
            $urlCur = Request::get('urlCur');
            $this->cartService->updateCart($id, $qty);
            echo $urlCur;
        }
    }
}
