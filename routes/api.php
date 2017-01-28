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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Route::get('/oauth-unauthorized',function(Request $request){
//    return "unauthorize";
//    //array("msg"=>"unauthorize");
// });

// Route::get('/test', function (Request $request) {
//     return "hello world";
// });
Route::post('auth/token', 'Api\LoginController@authenticate');
Route::post('auth/refresh', 'Api\LoginController@refreshToken');

Route::post('/getTicketStatusByTicketCode', 'Api\TicketController@getTicketStatusByTicketCode')
->middleware('auth:api');

Route::post('searchByNameEmailOrTicket', 'Api\TicketController@searchByNameEmailOrTicket')
->middleware('auth:api');

Route::post('getTicketUserDetailByEmailOrTicket', 'Api\TicketController@getTicketUserDetailByEmailOrTicket')
->middleware('auth:api');

Route::post('checkedIn', 'Api\TicketController@checkedIn')
->middleware('auth:api');