<?php
/**
 * Created by PhpStorm.
 * User: thai
 * Date: 9/14/2017
 * Time: 2:16 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index(){
        return view('admin.manager.edit')->with([
            'result' => Manager::first(),
            'title' => 'Manager'
        ]);
    }

    public function update(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $manager = Manager::first();
        $manager->where('id', $manager->id)->update($data);
        return redirect('dashboard/manager');
    }
}