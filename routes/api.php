<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('bank', 'BankController');

Route::get('bank/get_bank_by_name/{name}', 'BankController@get_bank_by_name');


Route::resource('test', 'TestController');


Route::get('get_test_by_year/{year}', 'TestController@get_test_by_year');

Route::post('login', 'TestController@get_login');
