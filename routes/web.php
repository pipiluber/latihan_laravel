<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\HTMLController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/hello-world', [HelloWorldController::class, 'index']);
route::get('/ambil-file', [HelloWorldController::class, 'ambilfile']);
route::get('/get-lorem', [HTMLController::class, 'getLorem']);
route::get('/get-tabel', [FormController::class, 'getTabel']);
route::get('/get-form', [FormController::class, 'getForm']);
route::resource('/anggota', AnggotaController::class);
route::get('/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda')->middleware('auth');
// route::get('backend/login', [LoginController::class, 'index'])->name('backend.login');
route::get('backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');
route::post('backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login');
route::post('backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');
route::resource('backend/user', UserController::class,['as' => 'backend'])->middleware('auth');
