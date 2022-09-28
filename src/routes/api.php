<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\IconController;

Route::GET('icon/generate', [IconController::class, 'get']);
Route::GET('blogs/all', [BlogController::class, 'all']);
