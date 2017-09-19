<?php

namespace App\Http\Controllers\Admin;

use App\Services\SettingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    private $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List';
        $listSetting  = $this->settingService->all();
        return view('admin.setting.index', compact('listSetting', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $title = 'Setting';
        $detail = $this->settingService->getSettingByCondition(['type' => $slug]);
        return view('admin.setting.update', compact('detail', 'title', 'slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($slug)
    {
        $title = 'Setting';
        $detail = $this->settingService->getSettingByCondition(['type' => $slug]);
        return view('admin.setting.update', compact('detail', 'title', 'slug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $dataRequest = $this->settingService->setData($request);
        if (!empty($dataRequest['dataEnglish'])){
            $this->settingService->updateSetting(['type' => $slug, 'lang' => 'en'], $dataRequest['dataEnglish']);
        }
        if (!empty($dataRequest['dataViet'])){
            $this->settingService->updateSetting(['type' => $slug, 'lang' => 'vn'], $dataRequest['dataViet']);
        }

        $message = ['level' => 'success', 'flash_message' => \MessageCategory::UPDATE_SUCCESS];

        return redirect('dashboard/setting')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
