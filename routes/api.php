<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController as CustomerController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\PostController as PostController;
use App\Http\Controllers\BlogController as BlogController;
use App\Http\Controllers\CategoryDetailsController as CategoryDetailsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('customers', 'App\Http\Controllers\CustomerController');

Route::resource('category', 'App\Http\Controllers\CategoryController');

Route::resource('post', 'App\Http\Controllers\PostController');

Route::resource('blog', 'App\Http\Controllers\BlogController');

Route::resource('category-details', 'App\Http\Controllers\CategoryDetailsController');
