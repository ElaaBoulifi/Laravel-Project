<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
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


Route::get('/login',function () {
    return view('share.login');
})->name('share.login');



Route::get('/freelancers', [FreelancerController::class,'index'])->name('Freelancer.index');
Route::get('/freelancers/list', [FreelancerController::class,'list'])->name('Freelancer.list');
Route::get('/freelancers/create', [FreelancerController::class,'create'])->name('Freelancer.create');
Route::post('/freelancers', [FreelancerController::class,'store'])->name('Freelancer.store');
Route::delete('/freelancers/{freelancer}/delete', [FreelancerController::class,'delete'])->name('Freelancer.delete');
Route::get('/freelancers/{freelancer}/edit', [FreelancerController::class,'edit'])->name('Freelancer.edit');
Route::put('/freelancers/{freelancer}/update', [FreelancerController::class,'update'])->name('Freelancer.update');