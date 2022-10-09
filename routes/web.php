<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/create-article',[ArticleController::class,'create_article'])->name('create_article');
    Route::post('/store_article',[ArticleController::class,'store_article'])->name('store_article');
});
Route::get('/articles',[ArticleController::class,'index'])->name('articles');
Route::get('/',[ArticleController::class,'index'])->name('articles');
Route::get('/articles/{id}',[ArticleController::class,'show_article'])->name('show_article');
Route::post('/add-comment',[ArticleController::class,'add_comment_to_article'])->name('add_comment');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';
