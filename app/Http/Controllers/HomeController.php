<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactEmail;
use App\Services\HomeService;
use Illuminate\Http\Request;
use Mail;

class HomeController extends MasterController
{
    private $homeService;
    public function __construct(HomeService $homeService)
    {
        parent::__construct($homeService);
        $this->homeService = $homeService;
    }


    /**
     * HomeController constructor.
     * @param HomeService $homeService
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataResponse = $this->homeService->showDataForHomePage();
        return view('frontend.pages.home')->with($dataResponse);
    }

    public function productSale($slug=null){
        $condition = [];
        if ($slug == null){
            $dataResponse = $this->homeService->showDataForListProduct($condition);
            if (count($dataResponse['listProduct']) == 0){
                return redirect('404');
            }
            $dataResponse['url'] = 'san-pham/' . $slug;
            return view('frontend.pages.productSale')->with($dataResponse);
        }

        $id = getIDBySlug($slug);
        if (!$id || !is_numeric($id)){
            return redirect('404');
        }
        $condition = ['products.category_id' => $id];
        $dataResponse = $this->homeService->showDataForListProduct($condition, $id);
        if (count($dataResponse['listProduct']) == 0){
            return redirect('404');
        }
        $dataResponse['url'] = 'san-pham/' . $slug;
        return view('frontend.pages.productSale')->with($dataResponse);
    }

    public function productDetail($slug=null){
        $id = getIDBySlug($slug);
        if (!is_numeric($id)){
            return redirect('404');
        }
        $condition = ['products.product_id' => $id];
        $dataResponse = $this->homeService->showDataProductForDetail($condition);
        return view('frontend.pages.product-detail')->with($dataResponse);
    }

    public function about(){
        $dataResponse = $this->homeService->showSettingForWebsite(['type' => 'about']);
        return view('frontend.pages.about')->with($dataResponse);
    }

    public function blog($slug = null){
        $condition = [];
        if ($slug == null){
            $dataResponse = $this->homeService->showDataBlogForBlogPage($condition);
            if (count($dataResponse['listPost']) == 0){
                return redirect('404');
            }
            $dataResponse['url'] = 'bai-viet/' . $slug;
            return view('frontend.pages.blog')->with($dataResponse);
        }

        $id = getIDBySlug($slug);
        if (!is_numeric($id)){
            return redirect('404');
        }
        $condition = ['commons.category_id' => $id];
        $dataResponse = $this->homeService->showDataBlogForBlogPage($condition);

        if (count($dataResponse['listPost']) == 0){
            return redirect('404');
        }
        $dataResponse['url'] = 'bai-viet/' . $slug;
        return view('frontend.pages.blog')->with($dataResponse);
    }

    public function blogDetail($slug = null){
        $id = getIDBySlug($slug);
        if (!$id || !is_numeric($id)){
            return redirect('404');
        }

        $condition = ['posts.common_id' => $id];
        $dataResponse = $this->homeService->showDataDetailPost($condition);

        if (count($dataResponse['detailPost']) == 0){
            return redirect('404');
        }

        return view('frontend.pages.blog-detail')->with($dataResponse);
    }

    public function sliderDetail($slug=null){
        $id = getIDBySlug($slug);
        if (!$id || !is_numeric($id)){
            return redirect('404');
        }

        $condition = ['sliders.common_id' => $id];
        $dataResponse = $this->homeService->showDataDetailSlider($condition);

        if (count($dataResponse['detailPost']) == 0){
            return redirect('404');
        }

        return view('frontend.pages.blog-detail')->with($dataResponse);
    }

    public function contact(){
        $dataResponse = $this->homeService->showSettingForWebsite(['type' => 'contact']);
        return view('frontend.pages.contact')->with($dataResponse);
    }

    /**
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeContact(ContactRequest $request){
        Mail::send(new ContactEmail($request));
        $message = ['level' => 'success', 'flash_message' =>trans('app.SendContactSuccess')];
        return redirect('contact')->with($message);
    }

    public function searchProduct(Request $request){
        $product = $request->query('product');
        $dataResponse = $this->homeService->searchProduct($product);
        if (!$dataResponse) return redirect('404');
        $dataResponse['url'] = 'tim-kiem?product=' . $product;
        return view('frontend.pages.productSale')->with($dataResponse);
    }

    public function notFound(){
        $dataResponse = $this->homeService->notFound();
        return view('frontend.pages.404')->with($dataResponse);
    }
}
