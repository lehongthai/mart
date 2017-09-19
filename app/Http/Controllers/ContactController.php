<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\BCATestConfig;
use App\Models\BCATestContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = \MessageContact::TITLE_INDEX;
        $listConfig = $this->processDataConfig();
        return view('test.contact', compact('title', 'listConfig'));
    }

    /**
     * @return array
     */
    private function processDataConfig(){
        $listConfig = BCATestConfig::all();
        $dataProcess = [];
        foreach ($listConfig as $config){
            $dataProcess[$config->slug] = $config->value;
        }
        return $dataProcess;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = new BCATestContact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        if ($contact->save()){
            $message = ['level' => 'success', 'flash_message' => \MessageContact::SEND_SUCCESS];
        }else{
            $message = ['level' => 'danger', 'flash_message' => \MessageContact::SEND_FAILED];
        }
        return redirect('contact')->with($message);
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
        //
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
        //
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
