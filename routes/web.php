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


Route::get('/tag/{name}', [FrontendController::class, 'postsWithTag']);

Auth::routes();

Route::get('/home', [BakendController::class, 'getAllPosts'])->name('home');

Route::get('/admin/post/{post}', [BakendController::class, 'editPosts']);
Route::post('/admin/post/{post:id}/update', [BakendController::class, 'updatePost'])->name('post.update');

Route::get('/admin/create/post', [BakendController::class, 'createPost']);
Route::post('/admin/save/post', [BakendController::class, 'savePost']);

Route::get('/admin/post/{post:id}/delete', [BakendController::class, 'deletePost']);
