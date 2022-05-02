<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\AuthController::class, 'getlogin']);

Route::get('/register', [App\Http\Controllers\AuthController::class, 'getregistration'])->name('register');
Route::post('/setregistration', [App\Http\Controllers\AuthController::class, 'setregistration'])->name('setregister');

Route::get('/login', [App\Http\Controllers\AuthController::class, 'getlogin'])->name('login');
Route::post('/setlogin', [App\Http\Controllers\AuthController::class, 'setlogin'])->name('setlogin');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'getdashboard'])->name('getdashboard');
Route::get('/api/dashboard', [App\Http\Controllers\HomeController::class, 'apigetdashboard'])->name('apigetdashboard');

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'getlogout'])->name('logout');

Route::get('/addpost', [App\Http\Controllers\HomeController::class, 'addpost'])->name('addpost');
Route::post('/submitpost', [App\Http\Controllers\HomeController::class, 'submitpost'])->name('submitpost');

Route::post('/updatepost', [App\Http\Controllers\HomeController::class, 'updatepost'])->name('updatepost');

Route::post('/deletepost', [App\Http\Controllers\HomeController::class, 'deletepost'])->name('deletepost');

Route::get('/editpost/{postid?}', [App\Http\Controllers\HomeController::class, 'editpost'])->name('editpost');


