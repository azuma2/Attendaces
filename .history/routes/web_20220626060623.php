<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\TimestampsController;
use App\Http\Controllers\RestController;

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
    Route::get('/', [WorkController::class, 'index']);
    Route::get('/infomation', [WorkController::class, 'infomation']);
    Route::get('/serch', [WorkController::class, 'serch']);
    Route::post('move1', [WorkController::class, 'move1']);
    Route::post('/move/{\Carbon\Carbon::today()}', [WorkController::class, 'move']);


    Route::get('/infomation2', [WorkController::class, 'infomation2']);
    Route::get('/infomation3', [WorkController::class, 'infomation3']);
});

Route::group(['middleware' => 'auth'], function() {
Route::post('/punchin', [TimestampsController::class, 'punchIn'])->name('timestamp/punchin');
Route::post('/punchout', [TimestampsController::class, 'punchOut'])->name('timestamp/punchout');
});


Route::group(['middleware' => 'auth'], function() {
Route::post('/restin', [RestController::class, 'restIn'])->name('rest/restin');
Route::post('/restout', [RestController::class, 'restOut'])->name('rest/restout');
});
