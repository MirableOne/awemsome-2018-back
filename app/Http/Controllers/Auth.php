<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Auth extends BaseController
{
    public function login(Request $request)
    {
        $_user = DB::table('users')->where('nick', $request->input('username'))->where('pswd', md5($request->input('password')))->first();

        if($_user){
            return response()->json([
                'user_id' => $_user->user_id,
                'user_name' => $_user->nick,
                'user_email' => $_user->email,
            ])
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        }else{
            return response()->json([
                'user_id' => null,
            ])
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        }
    }
}
