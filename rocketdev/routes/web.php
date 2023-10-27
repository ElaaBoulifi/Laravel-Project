<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\FreelancerResumeController;
use App\Http\Controllers\projetController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\stripecontroller;
use App\Http\Controllers\EventController;
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
    return view('welcome');
})->name('welcome');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
});


Route::get('/participate/create', 'App\Http\Controllers\ParticipateController@create')->name('participate.create');
Route::post('/participations', 'App\Http\Controllers\ParticipateController@store')->name('participate.store');
Route::get('/map', function () {
    return view('events.map');
});



Route::get('/generer-pdf', 'App\Http\Controllers\EventController@generatePDF')->name('generer.pdf');
Route::get('/events', 'EventController@searchByTitle')->name('events.index');



Route::get('/events/create','App\Http\Controllers\EventController@create');
Route::post('/events', 'App\Http\Controllers\EventController@store')->name('events.store');
Route::get('/events/list',[EventController::class,'list' ])->name('events.list');
Route::get('/eventsfront', [EventController::class, 'index'])->name('events.index');




Route::delete('/events/{events}', [EventController::class,'destroy' ])->name('events.delete');
Route::get('/events/{events}/edit', 'App\Http\Controllers\EventController@edit')->name('events.edit');
Route::put('/updatee/{events}', 'App\Http\Controllers\EventController@update')->name('events.updatee');

Route::get('/','App\Http\Controllers\FormationController@getall')->name('share.home');

Route::get('/formations/create','App\Http\Controllers\FormationController@create')->name('formations.create');
Route::post('/formations', 'App\Http\Controllers\FormationController@store')->name('formations.store');
// Adjust the route naming to make it clearer
Route::get('/candidatures/create', 'App\Http\Controllers\CandidatureController@create')->name('condidature.create');
Route::post('/candidatures', 'App\Http\Controllers\CandidatureController@store')->name('candidature.store');
Route::get('/candidatures', 'App\Http\Controllers\CandidatureController@getall')->name('candidature.list');

Route::get('/formations/list',[FormationController::class,'list' ])->name('formations.list');
Route::delete('/formations/{formation}', [FormationController::class,'destroy' ])->name('formations.delete');
Route::get('/formations/{formation}/edit', 'App\Http\Controllers\FormationController@edit')->name('formations.edit');
Route::put('/updatee/{formation}', 'App\Http\Controllers\FormationController@update')->name('formations.updatee');
Route::get('/projets', 'App\Http\Controllers\projetController@index')->name('projet');
Route::delete('/projets/{id}', 'App\Http\Controllers\projetController@destroy')->name('projets.destroy');
Route::delete('/candidatures/{id}', 'App\Http\Controllers\CandidatureController@destroy')->name('candidature.destroy');
Route::get('/candidatures/list', [CandidatureController::class,'list'])->name('condidature.back');
Route::get('/candidatures/{id}', [CandidatureController::class, 'showCandidatures'])->name('showCandidatures');

Route::get('/projet','App\Http\Controllers\projetController@getall')->name('projet');
Route::get('/create','App\Http\Controllers\projetController@create')->name('projet.create');
Route::post('/projets', 'App\Http\Controllers\projetController@store')->name('projet.store');
Route::get('/projet/list', [projetController::class,'list'])->name('projet.back');
Route::get('/projets/{id}/candidatures', [CandidatureController::class, 'showCandidatures'])->name('projets.candidatures');
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe.store');

Route::get('/login1',function () {
    return view('share.login');
})->name('share.login');

Route::delete('/inscription/{inscri}', 'App\Http\Controllers\inscriptionn@destroy' )->name('inscription.delete');

Route::get('/inscription/create', 'App\Http\Controllers\inscriptionn@create')->name('inscription.create');
Route::post('/inscriptions', 'App\Http\Controllers\inscriptionn@store')->name('inscription.store');
Route::get('/confirmation/{id}', 'App\Http\Controllers\inscriptionn@confirm')->name('inscription.confirmation');
Route::get('/inscription/list', 'App\Http\Controllers\inscriptionn@getall')->name('inscription.listinscri');

Route::get('stripe', [stripecontroller::class, 'stripe']);
Route::post('stripe', [stripecontroller::class, 'stripePost'])->name('stripe.post');
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

// ---------------------------- RECLAMATIONS ROUTES ---------------------------- //


Route::get('/reclamation', [ReclamationController::class,'create'])->name('reclamations.create');
Route::post('/reclamations', [ReclamationController::class,'store'])->name('reclamations.store');
Route::get('/reclamations', [ReclamationController::class, 'index'])->name('reclamations.index');
Route::delete('/reclamations/{id}', 'App\Http\Controllers\ReclamationController@destroy')->name('reclamations.destroy');
Route::delete('/reclamationss/{id}', 'App\Http\Controllers\ReclamationController@destroyy')->name('reclamations.destroyy');

Route::get('/reclamationslist', [ReclamationController::class, 'indexNonTraitees'])->name('reclamations.nontraitees');
Route::get('/reclamations/traitees', [ReclamationController::class, 'admin_reclamations'])->name('reclamations.admin_reclamations');
Route::get('/tri-reclamations', 'App\Http\Controllers\ReclamationController@trierReclamations')->name('reclamations.tri-reclamations');

Route::get('/reponse', [ReponseController::class,'create'])->name('reponses.create');
Route::post('/reponses', [ReponseController::class,'store'])->name('reponses.store');
Route::get('/reponses/{reponse}', [ReponseController::class, 'show'])->name('reponses.show');
Route::get('/reponses/{reponse}/client', [ReponseController::class, 'showFront'])->name('reponses.showFront');
Route::get('/chart', [ReclamationController::class, 'charts'])->name('reclamations.charts');
