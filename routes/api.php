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

Route::get('/users', 'ApiController@user');
Route::get('/forums', 'ApiController@forums');
Route::get('/forums/{forum}/threads', 'ApiController@threads');
Route::get('/forums/{forum}/threads/{thread}/messages', 'ApiController@messages');

Route::post('/forum/{forum}/thread/{thread}/messages', 'DashboardController@create');
Route::put('/forum/{forum}/thread/{thread}/messages/{message}', 'DashboardController@update');
Route::delete('/forum/{forum}/thread/{thread}/messages/{message}', 'DashboardController@delete');
