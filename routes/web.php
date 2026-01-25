<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\HTMLController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TableController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/hello-world', [HelloWorldController::class, 'index']);
route::get('/ambil-file', [HelloWorldController::class, 'ambilfile']);
route::get('/get-lorem', [HTMLController::class, 'getLorem']);
route::get('/get-tabel', [FormController::class, 'getTabel']);
route::get('/get-form', [FormController::class, 'getForm']);