<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

/** Главная страница */
Route::get('/', [HomeController::class, 'index']);

/** Список заявок */
Route::get('/requests', [RequestController::class, 'index']);
