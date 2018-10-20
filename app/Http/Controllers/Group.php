<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Group extends BaseController
{
    public function getList(Request $request)
    {
        $_group = DB::table('groups')
            ->join('users_groups_ids', 'groups.group_id', '=', 'users_groups_ids.group_id')
            ->join('users', 'users_groups_ids.user_id', '=', 'users.user_id')
            ->where('users.user_id', $request->input('user_id'))
            ->get();

        return response()->json($_group)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
