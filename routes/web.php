<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\PostsController;
use App\Http\Controllers\Auth\SlideController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\PostLikeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserPostController;
use App\Http\Controllers\Auth\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Front 
Route::get('/',[FrontController::class,'index']);
Route::get('/blog',[FrontController::class,'blog'])->name('post.blog');
Route::get('/post/{post}',[FrontController::class,'show'])->name('show');



// Dashboard 
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');

// Register 
Route::get('/users/register',[RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/users/register',[RegisterController::class,'store']);
Route::get('/users/login',[RegisterController::class,'login'])->name('login')->middleware('guest');

// Authenticate
Route::post('/users/authenticate',[RegisterController::class,'authenticate'])->name('authenticate');
// logout 
Route::post('/logout',[RegisterController::class,'logout'])->name('logout');

// Categories 
Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/create',[CategoryController::class,'store'])->name('categories.store');
Route::get('/categories/edit/{category}',[CategoryController::class,'edit'])->name('categories.edit');
Route::put('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');
Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.delete');

// Posts
Route::get('/posts',[PostsController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostsController::class,'create'])->name('posts.create');
Route::post('/posts',[PostsController::class,'store'])->name('posts.store');
Route::get('/posts/manage',[PostsController::class,'manage'])->name('posts.manage');
Route::get('/posts/publish/{id}',[PostsController::class,'publish'])->name('published');
Route::get('/posts/unpublish/{id}',[PostsController::class,'unpublish'])->name('unpublished');
Route::get('/posts/restore/{id}',[PostsController::class,'restore'])->name('restore');
Route::get('/posts/edit/{post}',[PostsController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post}',[PostsController::class,'update'])->name('posts.update');
Route::delete('/posts/{id}',[PostsController::class,'destroy'])->name('posts.delete');

// Slide 
Route::get('/slides',[SlideController::class,'index'])->name('slides.index');
Route::get('/slides/create',[SlideController::class,'create'])->name('slides.create');
Route::post('/slides',[SlideController::class,'store'])->name('slides.store');
Route::get('/slides/edit/{slide}',[SlideController::class,'edit'])->name('slides.edit');
Route::put('/slides/{slide}',[SlideController::class,'update'])->name('slides.update');
Route::delete('/slides/{slide}',[SlideController::class,'destroy'])->name('slides.delete');





// Like 
Route::post('/posts/{post}/likes',[PostLikeController::class,'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class,'destroy'])->name('posts.likes');

// User Post 
Route::get('/users/{user:name}/post',[UserPostController::class,'index'])->name('posts.user');
















