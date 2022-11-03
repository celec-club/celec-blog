<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminPanelController;

Route::GET('/', [HomeController::class, 'index']);
Route::GET('/blogs', [BlogController::class, 'showAll']);
Route::GET('/b/{slug}', [BlogController::class, 'get']);
Route::GET('user/{name}/{id}', [ProfileController::class, 'show']);

Route::GROUP(['prefix' => 'admin'], function () {
    Route::GET('login', [AdminPanelController::class, 'showLogin']);
    Route::POST('postLogin', [AdminPanelController::class, 'check']);
    Route::GROUP(['middleware' => 'auth'], function () {
        Route::GET('panel', [AdminPanelController::class, 'showIndex']);
        Route::GET('write', [AdminPanelController::class, 'showWritePage']);
        Route::GET('categories', [AdminPanelController::class, 'showCategoriesPage']);
        Route::POST('category', [CategoryController::class, 'create']);
        Route::POST('category/delete', [CategoryController::class, 'delete']);
        Route::POST('blog/add', [BlogController::class, 'create']);
        Route::POST('blog/delete', [BlogController::class, 'delete']);
        Route::POST('blog/delete', [BlogController::class, 'delete']);
        Route::GET('blog/modify/{blog}', [AdminPanelController::class, 'showModifyBlog']);
        Route::POST('blog/modify/{blog}', [BlogController::class, 'update']);
        Route::GET('blogs', [BlogController::class, 'getAll']);
        Route::GET('users', [UserController::class, 'show']);
        Route::POST('user/create', [UserController::class, 'create']);
        Route::POST('user/delete', [UserController::class, 'delete']);
    });
});

Route::GET('sitemap.xml', [BlogController::class, 'map']);
