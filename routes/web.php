<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/forum/{forum}', 'DashboardController@forum');
    Route::get('/forum/{forum}/thread/{thread}', 'DashboardController@thread');
    Route::post('/forum/{forum}/thread/{thread}', 'DashboardController@create');
});

require __DIR__.'/auth.php';
