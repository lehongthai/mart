<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Services\PostService;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = \MessagePost::TITLE_INDEX;
        $listPost = $this->postService->showListPage();
        return view('admin.post.index', compact('listPost', 'title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = \MessagePost::TITLE_CREATE;
        $listCate = $this->postService->showCategory();
        return view('admin.post.create', compact('listCate', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $dataRequest = $this->postService->setData($request);

        if (!empty($dataRequest['dataDetail'])){
            $commonID = $this->postService->storeCommon($dataRequest['dataDetail']);
            if (!empty($dataRequest['dataEnglish'])){
                $dataRequest['dataEnglish']['common_id'] = $commonID;
                $this->postService->store($dataRequest['dataEnglish']);
            }
            if (!empty($dataRequest['dataViet'])){
                $dataRequest['dataViet']['common_id'] = $commonID;
                $this->postService->store($dataRequest['dataViet']);
            }

            $message = ['level' => 'success', 'flash_message' => \MessageCategory::CREATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageCategory::CREATE_FAILED];
        }
        return redirect('dashboard/post')->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $title = \MessagePost::TITLE_INDEX;
        $listCate = $this->postService->showCategory();
        $post = $this->postService->findPost($id);

        if (!$post){
            $message = ['level' => 'danger', 'flash_message' => \MessagePost::POST_DOES_NOT_EXIST];
            return redirect('dashboard/post')->with($message);
        }
        return view('admin.post.update', compact('listCate', 'title', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        $post = $this->postService->findPost($id);
        if (!$post){
            $message = ['level' => 'danger', 'flash_message' => \MessagePost::POST_DOES_NOT_EXIST];
            return redirect('dashboard/post')->with($message);
        }

        $dataRequest = $this->postService->setData($request);
        if (!empty($dataRequest['dataDetail'])){
            $this->postService->updateCommon($id, $dataRequest['dataDetail']);
            if (!empty($dataRequest['dataEnglish'])){
                $this->postService->updateByCondition(
                    ['lang' => 'en', 'common_id' => $id],
                    $dataRequest['dataEnglish']
                );
            }
            if (!empty($dataRequest['dataViet'])){
                $this->postService->updateByCondition(
                    ['lang' => 'vn', 'common_id' => $id],
                    $dataRequest['dataViet']
                );
            }

            $message = ['level' => 'success', 'flash_message' =>\MessagePost::UPDATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageCategory::UPDATE_FAILED];
        }
        return redirect('dashboard/post')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = $this->postService->findPost($id);
        if (!$post){
            $message = ['level' => 'danger', 'flash_message' =>\MessagePost::POST_DOES_NOT_EXIST];
        }else{
            $this->postService->destroyPost($id);
            $message = ['level' => 'success', 'flash_message' => \MessagePost::DELETE_SUCCESS];
        }
        return redirect('dashboard/post')->with($message);
    }
}
