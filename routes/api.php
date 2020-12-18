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

Route::get('/users', 'ApiController@users');
Route::get('/forums', 'ApiController@forums');
Route::get('/forums/{forum}/threads', 'ApiController@threads');
Route::get('/forums/{forum}/threads/{thread}/messages', 'ApiController@messages');

Route::post('/forums/{forum}/threads/{thread}/messages', 'ApiController@create');
Route::put('/forums/{forum}/threads/{thread}/messages/{message}', 'ApiController@update');
Route::delete('/forums/{forum}/threads/{thread}/messages/{message}', 'ApiController@delete');
