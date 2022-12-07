<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('welcome');
});

//routing menuju halaman template
Route::get('/template', function () {
    return view('template');
});

//routing menuju halaman crud kategori
Route::resource('kategori', KategoriController::class);
Route::get('kategori/{kategori}/delete', [KategoriController::class, 'destroy']);

//routing menuju halaman crud menu
Route::resource('menu', MenuController::class);
Route::get('menu/{menu}/delete', [MenuController::class, 'destroy']);

//routing menuju halaman crud user
Route::resource('users', UserController::class)->middleware('owner');
Route::get('users/{user}/delete', [UserController::class, 'destroy'])->middleware('owner');

//routing menuju halaman dashboard
Route::get('dashboard', [OrderController::class, 'index'])->name('dashboard');
Route::post('order', [OrderController::class, 'order'])->name('order');

//routing auth
Auth::routes();

//routing menuju halaman home/beranda
Route::get('/home', [App\Http\Controllers\MenuController::class, 'menu'])->name('home');
