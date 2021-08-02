<?php

use App\Http\Controllers\IconController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::GET("icon/generate", [IconController::class, "get"]);
