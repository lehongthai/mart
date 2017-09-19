<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = \MessageCategory::TITLE_INDEX;
        $listCate = $this->categoryService->showListPage();
        return view('admin.category.index', compact('listCate', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = \MessageCategory::TITLE_CREATE;
        return view('admin.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataRequest = $this->categoryService->setData($request);

        if (!empty($dataRequest['dataDetail'])){
            $commonID = $this->categoryService->storeCommon($dataRequest['dataDetail']);
            if (!empty($dataRequest['dataEnglish'])){
                $dataRequest['dataEnglish']['common_id'] = $commonID;
                $this->categoryService->store($dataRequest['dataEnglish']);
            }
            if (!empty($dataRequest['dataViet'])){
                $dataRequest['dataViet']['common_id'] = $commonID;
                $this->categoryService->store($dataRequest['dataViet']);
            }

            $message = ['level' => 'success', 'flash_message' => \MessageCategory::CREATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageCategory::CREATE_FAILED];
        }
        return redirect('dashboard/category')->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=0)
    {
        $title = \MessageCategory::TITLE_EDIT;
        $category = $this->categoryService->findCategory($id);

        if (!$category){
            $message = ['level' => 'danger', 'flash_message' => \MessageCategory::CATEGORY_DOES_NOT_EXIST];
            return redirect('dashboard/category')->with($message);
        }
        return view('admin.category.update', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->categoryService->findCategory($id);
        if (!$category){
            $message = ['level' => 'danger', 'flash_message' => \MessageCategory::CATEGORY_DOES_NOT_EXIST];
            return redirect('dashboard/category')->with($message);
        }

        $dataRequest = $this->categoryService->setData($request);

        if (!empty($dataRequest['dataDetail'])){
            $this->categoryService->updateCommon($id, $dataRequest['dataDetail']);
            if (!empty($dataRequest['dataEnglish'])){
                $this->categoryService->updateByCondition(
                    ['lang' => 'en', 'common_id' => $id],
                    $dataRequest['dataEnglish']
                );
            }
            if (!empty($dataRequest['dataViet'])){
                $this->categoryService->updateByCondition(
                    ['lang' => 'vn', 'common_id' => $id],
                    $dataRequest['dataViet']
                );
            }

            $message = ['level' => 'success', 'flash_message' => \MessageCategory::UPDATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageCategory::UPDATE_FAILED];
        }
        return redirect('dashboard/category')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryService->findCategory($id);
        if (!$category){
            $message = ['level' => 'danger', 'flash_message' => \MessageCategory::CATEGORY_DOES_NOT_EXIST];
        }else{
            $this->categoryService->destroyCategory($id);
            $message = ['level' => 'success', 'flash_message' => \MessageCategory::DELETE_SUCCESS];
        }
        return redirect('dashboard/category')->with($message);
    }
}
