<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Challenge extends BaseController
{
    public function getList(Request $request)
    {
        $_challenge = DB::table('challenge')
            ->where('group_id', $request->input('group_id'))
            ->get()
            ->toArray();

        return  response()
            ->json($_challenge)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
