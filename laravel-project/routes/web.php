<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\FreelancerResumeController;
use App\Http\Controllers\projetController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\SubscriberController;

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

Route::get('/formations/create','App\Http\Controllers\FormationController@create')->name('formations.create');
Route::post('/formations', 'App\Http\Controllers\FormationController@store')->name('formations.store');
Route::get('/projets', 'App\Http\Controllers\projetController@index')->name('projet');
Route::delete('/projets/{id}', 'App\Http\Controllers\projetController@destroy')->name('projets.destroy');
Route::delete('/candidatures/{id}', 'App\Http\Controllers\CandidatureController@destroy')->name('candidature.destroy');
Route::get('/candidatures/list', [CandidatureController::class,'list'])->name('condidature.back');
Route::get('/candidatures/{id}', [CandidatureController::class, 'showCandidatures'])->name('showCandidatures');

Route::get('/projet','App\Http\Controllers\projetController@getall')->name('projet');
Route::get('/create','App\Http\Controllers\projetController@create');
Route::post('/projets', 'App\Http\Controllers\projetController@store')->name('projet.store');
Route::get('/projet/list', [projetController::class,'list'])->name('projet.back');
Route::get('/projets/{id}/candidatures', [CandidatureController::class, 'showCandidatures'])->name('projets.candidatures');
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe.store');

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

Route::get('/freelancer-resumes', [FreelancerResumeController::class, 'index'])->name('freelancer-resumes.index');
Route::get('/freelancer-resumes/create', [FreelancerResumeController::class, 'create'])->name('freelancer-resumes.create');
Route::post('/freelancer-resumes', [FreelancerResumeController::class, 'store'])->name('freelancer-resumes.store');
Route::get('/freelancer-resumes/{id}', [FreelancerResumeController::class, 'show'])->name('freelancer-resumes.show');
Route::get('/freelancer-resumes/{id}/edit', [FreelancerResumeController::class, 'edit'])->name('freelancer-resumes.edit');
Route::put('/freelancer-resumes/{id}', [FreelancerResumeController::class, 'update'])->name('freelancer-resumes.update');
Route::delete('/freelancer-resumes/{id}', [FreelancerResumeController::class, 'destroy'])->name('freelancer-resumes.destroy');
