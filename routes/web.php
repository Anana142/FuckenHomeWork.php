<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use \App\Http\Controllers\FrontendController;
use \App\Http\Controllers\BakendController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\TagController;
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

//Категории
Route::get('/listCategory', [CategoryController::class, 'getAllCategories'])->name('listCategory');
Route::get('/admin/category/{category:id}/delete', [CategoryController::class, 'deleteCategory']);
Route::get('/admin/category/{category:id}', [CategoryController::class, 'editCategory']);
Route::post('/admin/category/{category:id}/update', [CategoryController::class, 'updateCategory'])->name('category.update');
Route::get('/admin/create/category', [CategoryController::class, 'createCategory']);
Route::post('/admin/save/category', [CategoryController::class, 'saveCategory']);
//Конец категорий

//Тэги
Route::get('/listTags', [TagController::class, 'getAllTags'])->name('listTags');
Route::get('/admin/create/tag', [TagController::class, 'createTag']);
Route::post('/admin/save/tag', [TagController::class, 'saveTag']);
Route::post('/admin/tag/{tag:id}/update', [TagController::class, 'updateTag'])->name('tag.update');
Route::get('/admin/tag/{tag:id}', [TagController::class, 'editTag']);
Route::get('/admin/tag/{tag:id}/delete', [TagController::class, 'deleteTag']);
//конец тэгов

Route::get('/admin/post/{post}', [BakendController::class, 'editPosts']);

Route::post('/admin/post/{post:id}/update', [BakendController::class, 'updatePost'])->name('post.update');

Route::get('/admin/create/post', [BakendController::class, 'createPost']);

Route::post('/admin/save/post', [BakendController::class, 'savePost']);

Route::get('/admin/post/{post:id}/delete', [BakendController::class, 'deletePost']);
