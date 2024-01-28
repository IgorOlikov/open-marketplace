<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function (){

    //$users = User::all();
    //return response($users);

      $user = User::first();


      //$user->imageable()->create(['url' => 'aawqeqweadad']);
      dd($user->image->url);







});
