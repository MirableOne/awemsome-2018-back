<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'some backend for phonegap app';
});

Route::get('/test/get', 'Test@get');

/*return user_id*/
Route::get('/auth', 'Auth@login');

/**/
Route::get('/group/list', 'Group@getList');

Route::get('/challenge', 'Challenge@get');

Route::post('/challenge', 'Challenge@post');

Route::get('/challenge/list', 'Challenge@getList');

Route::get('/user/list', 'User@getList');

Route::get('/user/', 'User@getData');

Route::post('/message', 'Message@post');

Route::get('/message/list', 'Message@getList');

