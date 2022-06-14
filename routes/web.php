<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\WorkController;


Route::get('/', [WorkController::class, 'index']);

Route::get('register', [RegisteredUserController::class, 'registerShow']);
Route::post('register', [RegisteredUserController::class, 'registerStore']);
Route::get('/login', [RegisteredUserController::class, 'loginShow']);
Route::post('/login', [RegisteredUserController::class, 'loginSotre']);
Route::post('/logout', [RegisteredUserController::class, 'loginDestroy']);

Route::get('/verror', [RegisteredUserController::class, 'verror']);





use App\Http\Controllers\AuthorController;
Route::get('/auth', [AuthorController::class,'check']);
Route::post('/auth', [AuthorController::class,'checkUser']);

Route::get('/auth2', [AuthorController::class,'check2']);
Route::post('/auth2', [AuthorController::class,'checkUser2']);


Route::get('/home', [AuthorController::class, 'index2'])->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
