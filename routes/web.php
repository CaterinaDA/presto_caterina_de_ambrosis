<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


// Public Controller
Route::get('/', [PublicController::class, 'homepage'])->name('home');

Route::get('/search/article', [PublicController::class, 'searchArticles'])
  ->name('articles.search');


// Article Controller
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/articles/create', [ArticleController::class, 'create'])
  ->name('articles.create')
  ->middleware('auth');

Route::get('/articles/{article}', [ArticleController::class, 'show'])
  ->name('articles.show')
  ->middleware('auth');

// Article Controller filtro per categoria
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])
  ->name('article.byCategory');


// Revisor Controller
Route::middleware(['auth', 'isRevisor'])->group(function () {
  Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
  Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('revisor.accept');
  Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('revisor.reject');
});

Route::post('/become/revisor', [RevisorController::class, 'becomeRevisor'])
  ->name('become.revisor')
  ->middleware('auth');

Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])
  ->name('make.revisor');
