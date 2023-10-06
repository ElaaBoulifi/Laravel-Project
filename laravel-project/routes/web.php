<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\projetController;
use App\Http\Controllers\CandidatureController;

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
// Adjust the route naming to make it clearer
Route::get('/candidatures/create', 'App\Http\Controllers\CandidatureController@create')->name('condidature.create');
Route::post('/candidatures', 'App\Http\Controllers\CandidatureController@store')->name('candidature.store');
Route::get('/candidatures', 'App\Http\Controllers\CandidatureController@getall')->name('candidature.list');

Route::get('/formations/create','App\Http\Controllers\FormationController@create');
Route::post('/formations', 'App\Http\Controllers\FormationController@store')->name('formations.store');
Route::get('/projets', 'App\Http\Controllers\projetController@index')->name('projet');
Route::delete('/projets/{id}', 'App\Http\Controllers\projetController@destroy')->name('projets.destroy');
Route::delete('/candidatures/{id}', 'App\Http\Controllers\CandidatureController@destroy')->name('candidature.destroy');
Route::get('/candidatures/list', [CandidatureController::class,'list'])->name('condidature.back');

Route::get('/projet','App\Http\Controllers\projetController@getall')->name('projet');
Route::get('/create','App\Http\Controllers\projetController@create');
Route::post('/projets', 'App\Http\Controllers\projetController@store')->name('projet.store');
Route::get('/projet/list', [projetController::class,'list'])->name('projet.back');

Route::get('/login',function () {
    return view('share.login');
})->name('share.login');



Route::get('/freelancers', [FreelancerController::class,'index'])->name('Freelancer.index');
Route::get('/freelancers/list', [FreelancerController::class,'list'])->name('Freelancer.list');
Route::get('/freelancers/create', [FreelancerController::class,'create'])->name('Freelancer.create');
Route::post('/freelancers', [FreelancerController::class,'store'])->name('Freelancer.store');