<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(16);
        return view('admin.users.users')->with([
            'users' => $users
        ]);
        //
    }
    public function show($id){
        $user = User::with('roles')->find($id);
        return view('admin.users.user')->with([
            'user' => $user
        ]);
    }
    public function delete(Request $request){
     $userId = intval($request->input('user_id'));
     dd($request);
    }
}
