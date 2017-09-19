<?php

namespace App\Http\Controllers\Admin;

use App\Services\SliderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    private $sliderService;
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = \MessageSlider::TITLE_INDEX;
        $listSlider = $this->sliderService->showListPage();
        return view('admin.slider.index', compact('listSlider', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = \MessageSlider::TITLE_CREATE;
        $check = null;
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
        $dataRequest = $this->sliderService->setData($request);

        if (!empty($dataRequest['dataDetail'])){
            $commonID = $this->sliderService->storeCommon($dataRequest['dataDetail']);
            if (!empty($dataRequest['dataEnglish'])){
                $dataRequest['dataEnglish']['common_id'] = $commonID;
                $this->sliderService->store($dataRequest['dataEnglish']);
            }
            if (!empty($dataRequest['dataViet'])){
                $dataRequest['dataViet']['common_id'] = $commonID;
                $this->sliderService->store($dataRequest['dataViet']);
            }

            $message = ['level' => 'success', 'flash_message' => \MessageSlider::CREATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::CREATE_FAILED];
        }
        return redirect('dashboard/slider')->with($message);
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
        $slider = $this->sliderService->findSlider($id);
        $check = null;
        if (!$slider){
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::SLIDER_DOES_NOT_EXIST];
            return redirect('dashboard/slider')->with($message);
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
        $category = $this->sliderService->findSlider($id);
        if (!$category){
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::SLIDER_DOES_NOT_EXIST];
            return redirect('dashboard/slider')->with($message);
        }

        $dataRequest = $this->sliderService->setData($request);

        if (!empty($dataRequest['dataDetail'])){
            $this->sliderService->updateCommon($id, $dataRequest['dataDetail']);
            if (!empty($dataRequest['dataEnglish'])){
                $this->sliderService->updateByCondition(
                    ['lang' => 'en', 'common_id' => $id],
                    $dataRequest['dataEnglish']
                );
            }
            if (!empty($dataRequest['dataViet'])){
                $this->sliderService->updateByCondition(
                    ['lang' => 'vn', 'common_id' => $id],
                    $dataRequest['dataViet']
                );
            }

            $message = ['level' => 'success', 'flash_message' => \MessageSlider::UPDATE_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::UPDATE_FAILED];
        }
        return redirect('dashboard/slider')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->sliderService->findSlider($id);
        if (!$category){
            $message = ['level' => 'danger', 'flash_message' => \MessageSlider::SLIDER_DOES_NOT_EXIST];
        }else{
            $this->sliderService->destroyCategory($id);
            $message = ['level' => 'success', 'flash_message' => \MessageSlider::DELETE_SUCCESS];
        }
        return redirect('dashboard/slider')->with($message);
    }
}
