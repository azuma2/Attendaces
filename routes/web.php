<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\TimestampsController;

Route::get('/', [WorkController::class, 'index']);

Route::get('/verror', [RegisteredUserController::class, 'verror']);

Route::get('/home', [AuthorController::class, 'index2'])->middleware('auth');
//グループメソッド

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




Route::get('/', function () {
    return view('index');
})->middleware('auth');



Route::group(['middleware' => ['auth', 'can:admin']], function() {
    Route::get('admin/user/index', 'UserController@index')->name('admin/user/index');
    Route::get('admin/user/show/{id}', 'UserController@show')->name('admin/user/show');
});



Route::group(['middleware' => 'auth'], function() {
Route::post('/punchin', [TimestampsController::class, 'punchIn'])->name('timestamp/punchin');
Route::post('/punchout', [TimestampsController::class, 'punchOut'])->name('timestamp/punchout');
});


