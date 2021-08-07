<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PostController;
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

// Auth::routes();
// 初期画面
Route::get('/','App\Http\Controllers\ArticleController@index')->name('articles.index');
// Route::resource('/articles', 'ArticleController'); Ver6記述方法
Route::resource('articles', ArticleController::class)->except(['index'])->middleware('auth'); # Ver8記述方法 index除外
Route::resource('/articles', ArticleController::class)->only(['show']); //-- この行を追加
// ->middleware('auth') これでログインしているかを確認しログインしていない場合は使用可能にする
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
