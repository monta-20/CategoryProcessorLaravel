<?php

use Illuminate\Support\Facades\Route;

//return view pages
Route::get('/', function () {
    return view('welcome');
});
//Load page1
Route::get('/page1', 'App\Http\Controllers\PageController@print_page1');

//Load page2
Route::get('/page2','App\Http\Controllers\PageController@print_page2');

//Send Data
Route::get('/Data/index','App\Http\Controllers\PageController@send_data');
