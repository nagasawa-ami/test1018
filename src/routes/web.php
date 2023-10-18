<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

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



Route::get('/', [ContactController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);




// 管理画面の表示
Route::get('/search', [UserController::class, 'index'])->name('users.index');

// お問合せのデータを検索する
Route::post('/users', [UserController::class, 'search'])->name('users.search');

// お問合せのデータを削除する
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');