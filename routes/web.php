<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

// Route for showing the form to add a category (GET request)
Route::get('/category/form', [CategoryController::class, 'ShowFormCategory']);

// Route for handling the form submission and adding the category (POST request)
Route::post('/category/add', [CategoryController::class, 'AddCategory']);

// Get List Categories
Route::get('/category/list', [CategoryController::class, 'ListCategory']);

