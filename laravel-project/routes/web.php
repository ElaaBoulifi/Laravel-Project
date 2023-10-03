<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;

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

Route::get('/','App\Http\Controllers\FormationController@getall')->name('share.home');

Route::get('/formations/create','App\Http\Controllers\FormationController@create');
Route::post('/formations', 'App\Http\Controllers\FormationController@store')->name('formations.store');


Route::get('/login',function () {
    return view('share.login');
})->name('share.login');



