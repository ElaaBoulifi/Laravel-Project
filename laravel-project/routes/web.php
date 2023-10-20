<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FreelancerController;
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



Route::get('/events/create','App\Http\Controllers\EventController@create');
Route::post('/events', 'App\Http\Controllers\EventController@store')->name('events.store');
Route::get('/events/list',[EventController::class,'list' ])->name('events.list');
Route::get('/eventsfront', [EventController::class, 'index'])->name('events.index');




Route::delete('/events/{events}', [EventController::class,'destroy' ])->name('events.delete');
Route::get('/events/{events}/edit', 'App\Http\Controllers\EventController@edit')->name('events.edit');
Route::put('/updatee/{events}', 'App\Http\Controllers\EventController@update')->name('events.updatee');


Route::get('/login',function () {
    return view('share.login');
})->name('share.login');



Route::get('/freelancers', [FreelancerController::class,'index'])->name('Freelancer.index');
Route::get('/freelancers/list', [FreelancerController::class,'list'])->name('Freelancer.list');
Route::get('/freelancers/create', [FreelancerController::class,'create'])->name('Freelancer.create');
Route::post('/freelancers', [FreelancerController::class,'store'])->name('Freelancer.store');