<?php

use App\Http\Controllers\API\RequestController;
use Illuminate\Support\Facades\Route;

/** Список заявок */
Route::get('/requests', [RequestController::class, 'index']);

/** Подробный просмотр заявки */
Route::get('/requests/{request}', [RequestController::class, 'show']);
