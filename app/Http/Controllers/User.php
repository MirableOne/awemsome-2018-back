<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class User extends BaseController
{
    public function get(Request $request)
    {
        $_group = DB::table('users')
            ->select(['users.user_id', 'users.nick'])
            ->join('users_groups_ids', 'users_groups_ids.user_id', '=', 'users.user_id')
            ->join('groups', 'groups.group_id', '=', 'users_groups_ids.group_id')
            ->where('groups.group_id', $request->input('group_id'))
            ->get();

        return response()
            ->json($_group)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
