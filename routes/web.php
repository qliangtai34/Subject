<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\PhpController; 
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::post('/posts/{id}', [PostController::class, 'update']);
Route::post('/posts/{id}', [PostController::class, 'delete']);
Route::get('/php', [PhpController::class, 'php']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/subjects', [SubjectController::class, 'index']);
Route::get('/subjects/search', [SubjectController::class, 'search']);
Route::post('/subjects', [SubjectController::class, 'create']);
Route::post('/subjects/update/{id}',[SubjectController::class, 'update']);
Route::post('/subjects/break/{id}',[SubjectController::class, 'break']);