<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardCarouselController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrameController;
use App\Http\Controllers\UserUploadController;
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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('layouts.laravel');
});

Route::get('/welcome', function () {
    return view('layouts.app');
});

Route::match(['get', 'post'], '/index', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('auth');

// Group routes for dashboard with middleware
Route::group(['middleware' => 'auth'], function () {
    Route::post('/dashboard/create-client', [DashboardController::class, 'createClient'])->name('dashboard.create_client');
    Route::get('/dashboard{id}', [DashboardController::class, 'index'])->name('dashboard.show');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::delete('/dashboard/{client}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('edit/{client}', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{client}', [DashboardController::class, 'update'])->name('dashboard.update');
});



// Group routes for frames with middleware
Route::group(['middleware' => 'auth'], function () {
    Route::patch('frame/{client}', [FrameController::class, 'store'])->name('frames.store');
    Route::put('/frames/{frame}', [FrameController::class, 'update'])->name('frames.update');
    Route::get('/frames/{id}', [FrameController::class, 'show'])->name('frames.get');
    Route::get('/frames/edit/{frame}', [FrameController::class, 'edit'])->name('frames.edit');
    Route::post('/frames/save-sorter', [FrameController::class, 'saveSorter'])->name('frames.saveSorter');
    Route::delete('/frames/{frame}', [FrameController::class, 'destroy'])->name('frames.destroy');

});



Route::get('/user-upload/', [UserUploadController::class, 'index'])->name('user-upload');
Route::put('/user-upload/upload-photo', [UserUploadController::class, 'uploadPhoto'])->name('upload-photo');

// Testing
Route::post('/upload/{frame}',[UserUploadController::class, 'saveCroppedImage'] )->name('save.cropped.image');
 // 3 testing
    Route::post('/update/{frame}',[UserUploadController::class, 'update'] )->name('upload-user.update');



Route::group(['middleware' => 'auth'], function (){

});



// other controller to be use it later
Route::get('/dashboard/autoLogin/{id}', [ClientController::class, 'autoLogin'])->name('dashboard.autoLogin')->middleware('signed');
// ends other controller
Route::get('/client/create', [ClientController::class, 'showCreateForm'])->name('client.showCreateForm');
Route::post('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::get('/client/autoLogin/{id}', [ClientController::class, 'autoLogin'])->name('client.autoLogin')->middleware('signed');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
