<?php

use App\Http\Controllers\Api\v1\OAuthController;
use App\Http\Controllers\Api\v1\Profile;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function (){
    //$users = User::all();
    //return response($users);
      $user = User::first();
      //$user->imageable()->create(['url' => 'aawqeqweadad']);
      dd($user->image->url);
});

Route::group(['prefix' => 'v1/oauth'], function () {
    Route::post('token', [OAuthController::class, 'token'])->name('token');
    Route::post('refresh', [OAuthController::class, 'refresh'])->name('refresh');
    Route::post('register', [OAuthController::class, 'register'])->name('register');
});

Route::group(['prefix' => 'v1/'], function () {
    Route::get('profile',[Profile::class,'index'])->middleware('auth:api');
});
