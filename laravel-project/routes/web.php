<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\FreelancerResumeController;
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

Route::get('/formations/create','App\Http\Controllers\FormationController@create')->name('formations.create');
Route::post('/formations', 'App\Http\Controllers\FormationController@store')->name('formations.store');


Route::get('/login',function () {
    return view('share.login');
})->name('share.login');

Route::get('/formations/list',[FormationController::class,'list' ])->name('formations.list');
Route::delete('/formations/{formation}', [FormationController::class,'destroy' ])->name('formations.delete');
Route::get('/formations/{formation}/edit', 'App\Http\Controllers\FormationController@edit')->name('formations.edit');
Route::put('/updatee/{formation}', 'App\Http\Controllers\FormationController@update')->name('formations.updatee');

Route::get('/freelancers', [FreelancerController::class,'index'])->name('Freelancer.index');
Route::get('/freelancers/list', [FreelancerController::class,'list'])->name('Freelancer.list');
Route::get('/freelancers/create', [FreelancerController::class,'create'])->name('Freelancer.create');
Route::post('/freelancers', [FreelancerController::class,'store'])->name('Freelancer.store');
Route::delete('/freelancers/{freelancer}/delete', [FreelancerController::class,'delete'])->name('Freelancer.delete');
Route::get('/freelancers/{freelancer}/edit', [FreelancerController::class,'edit'])->name('Freelancer.edit');
Route::put('/freelancers/{freelancer}/update', [FreelancerController::class,'update'])->name('Freelancer.update');

Route::get('/','App\Http\Controllers\FormationController@getall')->name('share.home');


Route::get('/freelancer-resumes', [FreelancerResumeController::class, 'index']);
Route::get('/freelancer-resumes/create', [FreelancerResumeController::class, 'create']);
Route::post('/freelancer-resumes', [FreelancerResumeController::class, 'store']);
Route::get('/freelancer-resumes/{id}', [FreelancerResumeController::class, 'show']);
Route::get('/freelancer-resumes/{id}/edit', [FreelancerResumeController::class, 'edit']);
Route::put('/freelancer-resumes/{id}', [FreelancerResumeController::class, 'update']);
Route::delete('/freelancer-resumes/{id}', [FreelancerResumeController::class, 'destroy']);