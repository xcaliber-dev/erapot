<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('siswaall', 'SiswaController@showAll');
Route::get('siswasingle/{nis}', 'SiswaController@showSingle');
Route::post('siswainsert', 'SiswaController@insert');
Route::post('tesfoto', 'SiswaController@testphoto');
Route::get('getfoto', 'SiswaController@getfoto');
Route::get('getnis', 'SiswaController@getnis');
Route::get('lastid', 'SiswaController@getLastNIS');

Route::get('nilaisiswa', 'NilaiSiswaController@semua');
Route::get('rawsql/{nis}', 'NilaiSiswaController@test');