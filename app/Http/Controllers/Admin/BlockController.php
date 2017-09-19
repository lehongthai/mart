<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 9/10/2017
 * Time: 10:32 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\SliderService;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    private $blockService;
    public function __construct(SliderService $blockService)
    {
        $this->blockService = $blockService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = \MessageSlider::TITLE_INDEX;
        $listBlock = $this->blockService->showListPage('block');
        return view('admin.block.index', compact('listBlock', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = \MessageSlider::TITLE_CREATE;
        $check = 'block';
        return view('admin.slider.create', compact('title', 'check'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataRequest = $this->blockService->setData($request, 'block');
        if (!empty($dataRequest['dataDetail'])){
            $commonID = $this->blockService->storeCommon($dataRequest['dataDetail']);
            if (!empty($dataRequest['dataEnglish'])){
                $dataRequest['dataEnglish']['common_id'] = $commonID;
                $this->blockService->store($dataRequest['dataEnglish']);
            }
            if (!empty($dataRequest['dataViet'])){
                $dataRequest['dataViet']['common_id'] = $commonID;
                $this->blockService->store($dataRequest['dataViet']);
            }

            $message = ['level' => 'success', 'flash_message' => \MessageSlider::CREATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::CREATE_FAILED];
        }
        return redirect('dashboard/block')->with($message);
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
    public function edit($id)
    {
        $title = \MessageSlider::TITLE_EDIT;
        $slider = $this->blockService->findSlider($id);
        $check = 'block';
        if (!$slider){
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::SLIDER_DOES_NOT_EXIST];
            return redirect('dashboard/block')->with($message);
        }
        return view('admin.slider.update', compact('slider', 'title', 'check'));
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
        $category = $this->blockService->findSlider($id);
        if (!$category){
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::SLIDER_DOES_NOT_EXIST];
            return redirect('dashboard/block')->with($message);
        }

        $dataRequest = $this->blockService->setData($request, 'block');

        if (!empty($dataRequest['dataDetail'])){
            $this->blockService->updateCommon($id, $dataRequest['dataDetail']);
            if (!empty($dataRequest['dataEnglish'])){
                $this->blockService->updateByCondition(
                    ['lang' => 'en', 'common_id' => $id],
                    $dataRequest['dataEnglish']
                );
            }
            if (!empty($dataRequest['dataViet'])){
                $this->blockService->updateByCondition(
                    ['lang' => 'vn', 'common_id' => $id],
                    $dataRequest['dataViet']
                );
            }

            $message = ['level' => 'success', 'flash_message' => \MessageSlider::UPDATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::UPDATE_FAILED];
        }
        return redirect('dashboard/block')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->blockService->findSlider($id);
        if (!$category){
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::SLIDER_DOES_NOT_EXIST];
        }else{
            $this->blockService->destroyCategory($id);
            $message = ['level' => 'success', 'flash_message' => \MessageSlider::DELETE_SUCCESS];
        }
        return redirect('dashboard/block')->with($message);
    }
}