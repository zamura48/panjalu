<?php

use App\Http\Controllers\C_LayananKejari;
use App\Http\Controllers\C_LayananAntar;
use App\Http\Controllers;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\http\Middleware\CheckRole;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('panjalu.index');
});
// LAYANAN ANTAR
Route::get('/layananantar', [C_LayananAntar::class, 'index']);
Route::post('/layananantar', [C_LayananAntar::class, 'search']);
Route::get('/layananantar/barang', [C_LayananAntar::class, 'antarbarang']);
Route::post('/layananantar/store', [C_LayananAntar::class, 'store']);

// PANJALU
Route::get('/panjalu/lacak_pengaduan', [C_LayananKejari::class, 'index']);
Route::get('/panjalu/ajukan_pengaduan', [C_LayananKejari::class, 'create']);
Route::post('/panjalu/store', [C_LayananKejari::class, 'store']);
Route::post('/panjalu/lacak_pengaduan', [Controllers\C_LayananKejari::class, 'search'])->name('panjalusearch');

//Postlogin
Route::POST('/postlogin', [AuthController::class, 'postlogin']);
// Logout
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth'], function(){

    // ADMIN PANJALU
    Route::group(['middleware' => 'CheckRole:panjalu'], function(){
        Route::get('/panjalu/admin', [Controllers\C_LayananKejari::class, 'indexadmin']);
        Route::post('/panjalu/admin/update', [Controllers\C_LayananKejari::class, 'updateAdmin']);
        Route::post('/panjalu/admin', [Controllers\C_LayananKejari::class, 'searchAdmin'])->name('panjaluAdminsearch');
        Route::get('/panjalu/admin/show/{id}', [Controllers\C_LayananKejari::class, 'show'])->name('show.panjalu')->where('id', '.*');

    });

    // ADMIN LAYANAN ANTAR
    Route::group(['middleware' => 'CheckRole:layantar'], function(){
        Route::get('/layananantar/admin', [Controllers\C_LayananAntar::class, 'indexadminlay']);
        Route::post('/layananantar/admin/tab1', [Controllers\C_LayananAntar::class, 'adminsearchtab1'])->name('adminsearchtab1');
        Route::post('/layananantar/admin/tab2', [Controllers\C_LayananAntar::class, 'adminsearchtab2'])->name('adminsearchtab2');
        Route::post('/layananantar/update', [Controllers\C_LayananAntar::class, 'update']);
    });
});

//Reject
Route::get('/reject', [AuthController::class, 'reject'])->name('reject');

//register
Route::get('/register', [AuthController::class, 'register'])->name('register');
