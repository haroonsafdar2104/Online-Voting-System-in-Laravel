<?php
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\candidate_Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\voter_Controller;
  
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
Route::get('/search', [candidate_Controller::class, 'search'])->name('search');

// Route::get('voter/create', 'VoterController@create')->name('voter.create');
Route::resource('/voter', voter_Controller::class);
Route::get('/search', [voter_Controller::class, 'search'])->name('search');
Route::get('/polling', [Voter_Controller::class, 'showPollingPage']);
Route::post('/vote', [Voter_Controller::class, 'vote'])->name('vote');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');