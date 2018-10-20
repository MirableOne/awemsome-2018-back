<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Challenge extends BaseController
{
    public function getList(Request $request)
    {
        $_challenge = DB::table('challange')
            ->where('group_id', $request->input('group_id'))
            ->get()
            ->toArray();

        return response()
            ->json($_challenge)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    public function post(Request $request)
    {
        $_challengeId = DB::table('challange')
            ->insertGetId([
                'description' => $request->input('description'),
                'title' => $request->input('title'),
                'group_id' => $request->input('group_id'),
                'author_id' => $request->input('author_id'),
                'assignee_id' => $request->input('assignee_id')
            ]);

        return response()
            ->json([
                'challenge_id' => $_challengeId
            ])
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
