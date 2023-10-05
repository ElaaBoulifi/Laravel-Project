<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ReclamationController;

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


Route::get('/reclamation', [ReclamationController::class,'create'])->name('reclamations.create');
Route::post('/reclamations', [ReclamationController::class,'store'])->name('reclamations.store');
Route::get('/reclamations', [ReclamationController::class, 'index'])->name('reclamations.index');
Route::delete('/reclamations/{id}', 'App\Http\Controllers\ReclamationController@destroy')->name('reclamations.destroy');
Route::get('/reclamationslist', [ReclamationController::class, 'admin_reclamations'])->name('reclamations.admin_reclamations');

Route::get('/freelancers', [FreelancerController::class,'index'])->name('Freelancer.index');
Route::get('/freelancers/list', [FreelancerController::class,'list'])->name('Freelancer.list');
Route::get('/freelancers/create', [FreelancerController::class,'create'])->name('Freelancer.create');
Route::post('/freelancers', [FreelancerController::class,'store'])->name('Freelancer.store');