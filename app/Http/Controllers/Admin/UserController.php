<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = \MessageUser::TITLE_INDEX;
        $listUser = User::all();
        return view('admin.user.index', compact('listUser', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
    public function profile()
    {
        $title = \MessageUser::TITLE_PROFILE;
        $userProfile = User::find(Auth::user()->id);
        return view('admin.user.profile', compact('userProfile', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $title = \MessageUser::TITLE_EDIT;
        $user = User::find(Auth::user()->id);
        return view('admin.user.update', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthday = date_format(date_create($request->birthday), 'Y-m-d');
        $user->note = $request->note;
        $user->save();
        $message = ['level' => 'success', 'flash_message' => \MessageUser::UPDATE_SUCCESS];
        return redirect('dashboard/user/index')->with($message);
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
