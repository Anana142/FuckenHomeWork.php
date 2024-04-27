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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('/', [FrontendController::class, 'getAllPosts']);
Route::get('/post/{id}', [FrontendController::class, 'getOnePost'] );
Route::get('/category/{id}', [FrontendController::class, 'postsWithCategory']);
Route::get('/tag/{name}', [FrontendController::class, 'postsWithTag']);

Auth::routes();

Route::get('/home', [BakendController::class, 'getAllPosts'])->name('home');

Route::middleware('auth')->prefix('/admin')->group(function(){
//Категории
    Route::prefix('/category')->group(function(){
        Route::get('/', [CategoryController::class, 'getAllCategories'])->name('listCategory');
        Route::get('/delete/{category:id}', [CategoryController::class, 'deleteCategory']);
        Route::get( '/edit/{category:id}', [CategoryController::class, 'editCategory']);
        Route::post('/update/{category:id}', [CategoryController::class, 'updateCategory'])->name('category.update');
        Route::get('/create', [CategoryController::class, 'createCategory']);
        Route::post('/save', [CategoryController::class, 'saveCategory']);
    });
//Конец категорий

//Тэги
    Route::prefix('/tag')->group(function(){
        Route::get('/', [TagController::class, 'getAllTags'])->name('listTags');
        Route::get('/create', [TagController::class, 'createTag']);
        Route::post('/save', [TagController::class, 'saveTag']);
        Route::post('/update/{tag:id}', [TagController::class, 'updateTag'])->name('tag.update');
        Route::get('/edit/{tag:id}', [TagController::class, 'editTag']);
        Route::get('/delete/{tag:id}', [TagController::class, 'deleteTag']);
    });
//конец тэгов
    Route::prefix('/post')->group(function() {
        Route::get('/edit/{post}', [BakendController::class, 'editPosts']);
        Route::post('/update/{post:id}', [BakendController::class, 'updatePost'])->name('post.update');
        Route::get('/create', [BakendController::class, 'createPost']);
        Route::post('/save', [BakendController::class, 'savePost']);
        Route::get('/delete/{post:id}', [BakendController::class, 'deletePost']);
    });
});



