<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\AdminController::class, 'login']);
Route::get('register', [Controllers\AdminController::class, 'register']);

Route::post('signIn', [Controllers\AuthController::class, 'signIn']);
Route::post('signUp', [Controllers\AuthController::class, 'signUp']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', [Controllers\AdminController::class, 'dashboard']);
    Route::get('signOut', [Controllers\AuthController::class, 'signOut']);
    Route::resource('task', Controllers\TaskController::class);
    Route::post('dropdownview', [Controllers\TaskController::class, 'dropdownview']);
});
