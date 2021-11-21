<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;

class UserDetailController extends Controller
{
    //
    public function show($id)
    {
        //역관계 참조
        $user_detail = UserDetail::find($id);
        //dd($user_detail->user); 

        //관계 참조
        // $user = User::find($id);
        // dd($user->userDetailssss);

        // JSON 형식으로 반환
        //return $user_detail->user;
        return response()->json($user_detail->user, 200);
    }
}
