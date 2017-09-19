<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = \MessageProduct::TITLE_INDEX;
        $listProduct = $this->productService->getAllProduct();
        return view('admin.product.index', compact('listProduct', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = \MessageProduct::TITLE_CREATE;
        $listCate = $this->productService->showCategory();
        return view('admin.product.create', compact('listCate', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $data = $this->productService->setData($request);
        $productId = $this->productService->storeProductDetail($data['dataDetail']);
        if ($productId){
            $this->productService->storeImageProductDetail($productId, $request);
            if (!empty($data['dataEnglish'])){
                $data['dataEnglish']['product_id'] = $productId;
                $this->productService->store($data['dataEnglish']);
            }
            if (!empty($data['dataViet'])){
                $data['dataViet']['product_id'] = $productId;
                $this->productService->store($data['dataViet']);
            }

            $message = ['level' => 'success', 'flash_message' => \MessageProduct::CREATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageProduct::CREATE_FAILED];
        }
        return redirect('dashboard/product')->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = \MessageProduct::TITLE_SHOW;
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=0)
    {
        $title = \MessageProduct::TITLE_EDIT;
        $product = $this->productService->find($id);

        if (!$product){
            $message = ['level' => 'danger', 'flash_message' => \MessageProduct::PRODUCT_DOES_NOT_EXIST];
            return redirect('dashboard/product/index')->with($message);
        }
        $listCate = $this->productService->showCategory();
        return view('admin.product.update', compact('listCate', 'product', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id=0)
    {
        $product = $this->productService->find($id);
        if (!$product){
            $message = ['level' => 'danger', 'flash_message' => \MessageProduct::PRODUCT_DOES_NOT_EXIST];
            return redirect('dashboard/product/index')->with($message);
        }

        $dataUpdate = $this->productService->setData($request);
        if ($this->productService->updateProductDetail($id, $dataUpdate)){
            $this->productService->updateImageProductDetail($product->mutilImage, $request, $id);
            if (!empty($dataUpdate['dataEnglish'])) {
                $this->productService->updateByCondition(
                    ['product_id' => $id, 'lang' => 'en'],
                    $dataUpdate['dataEnglish']
                );
            }
            if (!empty($dataUpdate['dataViet'])) {
                $this->productService->updateByCondition(
                    ['product_id' => $id, 'lang' => 'vn'],
                    $dataUpdate['dataViet']
                );
            }
            $message = ['level' => 'success', 'flash_message' => \MessageProduct::UPDATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageProduct::CREATE_FAILED];
        }
        return redirect('dashboard/product')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=0)
    {
        $product = $this->productService->find($id);
        if (!$product){
            $message = ['level' => 'danger', 'flash_message' => \MessageProduct::PRODUCT_DOES_NOT_EXIST];
        }else{
            if($this->productService->destroy($id)){
                $message = ['level' => 'success', 'flash_message' => \MessageProduct::DELETE_SUCCESS];
            }else{
                $message = ['level' => 'danger', 'flash_message' => \MessageProduct::DELETE_FAILED];
            }
        }
        return redirect('dashboard/product')->with($message);

    }
}
