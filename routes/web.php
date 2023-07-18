<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardCarouselController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.laravel');
});
Route::get('/welcome', function () {
    return view('layouts.app');
});
Route::match(['get', 'post'], '/index', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('auth');

// crud starts
Route::post('/dashboard/create-client', [DashboardController::class, 'createClient'])->name('dashboard.create_client');
Route::get('/dashboard{id}', [DashboardController::class, 'index'])->name('dashboard.show');

Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');


/// testing controller
(Route::get('edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit'));
Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
// crud ends

// dashboard Frame
//Route::get('/dashboard/frame', [DashboardController::class, 'showFrame'])->name('dashboard.frame');
//Route::post('/dashboard/frame', [DashboardController::class, 'storeFrame'])->name('dashboard.frame.store');
// end dashboard Frame

// Frame Controller
Route::post('dashboard/frame/{id}', [DashboardController::class, 'store'])->name('frames.store');

// End Frame controller

// other controller to be use it later
Route::get('/dashboard/autoLogin/{id}', [ClientController::class, 'autoLogin'])->name('dashboard.autoLogin')->middleware('signed');
// ends other controller
Route::get('/client/create', [ClientController::class, 'showCreateForm'])->name('client.showCreateForm');
Route::post('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::get('/client/autoLogin/{id}', [ClientController::class, 'autoLogin'])->name('client.autoLogin')->middleware('signed');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
