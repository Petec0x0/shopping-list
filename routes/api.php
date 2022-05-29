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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', 'App\Http\Controllers\ShoppingListController@categories');
Route::get('/list', 'App\Http\Controllers\ShoppingListController@index');
Route::post('/list', 'App\Http\Controllers\ShoppingListController@store');
Route::post('/item-update', 'App\Http\Controllers\ShoppingListController@update');
Route::post('/item-delete', 'App\Http\Controllers\ShoppingListController@delete');

    