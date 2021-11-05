<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/** Главная страница */
Route::get('/', [HomeController::class, 'index']);
