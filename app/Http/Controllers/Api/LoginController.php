<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    //use AuthenticatesUsers;
    
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticate(Request $request)
    {
        $email = $request->input('username');
        $password = $request->input('password');
        $request->request->add([
            'username' => $email,
            'password' => $password,
            'grant_type' => 'password',
            'client_id' => env('CLIENT_SECRET', ''),
            'client_secret' => env('CLIENT_SECRET', ''),
            'scope' => '*'
        ]);

        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return Route::dispatch($proxy);
       // return Route::dispatch($tokenRequest)->getContent();
    }

      /**
     * @param Request $request
     * @return mixed
     */
    protected function refreshToken(Request $request)
    {
       
        $request->request->add([
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' =>env('CLIENT_SECRET'),
            'client_secret' =>env('CLIENT_SECRET'),
        ]);

        $proxy = Request::create(
            '/oauth/token',
            'POST'
        );

        return Route::dispatch($proxy);
    }

}
