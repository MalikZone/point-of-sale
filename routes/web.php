<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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
    return view('dashboard');
});

Route::prefix('user')->group(function () {
    Route::get('/', [userController::class, 'index']);
    Route::post('/create', [userController::class, 'store']);
    Route::delete('/delete/{id}', [userController::class, 'delete']);
});