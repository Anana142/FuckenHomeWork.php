<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use \App\Http\Controllers\FrontendController;
use \App\Http\Controllers\BakendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'getAllPosts']);

Route::get('/post/{id}', [FrontendController::class, 'getOnePost'] );

Route::get('/category/{id}', [FrontendController::class, 'postsWithCategory']);

Route::get('/admin', [BakendController::class, 'getAllPosts']);

Route::get('/admin/edit/{id}', [BakendController::class, 'EditPosts']);

