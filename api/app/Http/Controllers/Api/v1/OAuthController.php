<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OAuthController extends Controller
{
    public function token(Request $request)
    {
       //$get = Http::post(env('CONTAINER_NGINX_URL').'/oauth/token');
       //return response($get);

        $response = Http::asForm()->post(env('CONTAINER_NGINX_URL').'/oauth/token', [
            'grant_type' => 'password',
            'client_id' => config('passport.password_grant_client.id'),
            'client_secret' => config('passport.password_grant_client.secret'),
            'username' => $request->get('email'),
            'password' => $request->get('password'),
            'scope' => '',
        ]);

        return response($response);
    }

    public function refresh(Request $request)
    {
        $response = Http::asForm()->post(env('CONTAINER_NGINX_URL').'/oauth/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->get('refresh_token'),
            'client_id' => config('passport.password_grant_client.id'),
            'client_secret' => config('passport.password_grant_client.secret'),
            'scope' => '',
        ]);

        return $response->json();
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            ]);
    }



}
