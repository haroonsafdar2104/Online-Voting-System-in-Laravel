<?php
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\candidate_Controller;
use App\Http\Controllers\voter_Controller;
use App\Http\Controllers\Auth;
  
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
    });
Route::resource('/candidate', candidate_Controller::class);
Route::get('/csearch', [candidate_Controller::class, 'search'])->name('csearch');

Route::get('/showsupport', [voter_controller::class, 'showsupport'])->name('showsupport');
Route::post('/support', [voter_controller::class, 'support'])->name('support');
Route::get('voter/create', [Voter_controller::class,'create'])->name('voter.create');
Route::post('voter/store', [Voter_controller::class,'store'])->name('store');
Route::get('/voter', [voter_Controller::class,'index'])->name('voter.index');
Route::get('/search', [voter_Controller::class, 'search'])->name('search');
Route::get('/polling', [Voter_Controller::class, 'showPollingPage']);
Route::post('/dashboard', [Voter_Controller::class, 'vote'])->name('vote');
Route::get('/polling_result', [Voter_Controller::class, 'polling_result'])->name('polling_result');
Route::delete('/voter/{id}/delete', [voter_Controller::class,'delete'])->name('delete');



Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
