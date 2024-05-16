<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Models\Todo;

use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);
Route::get('/todos/{id}', [TodoController::class, 'update']);
Route::patch('/todos/{id}', [TodoController::class, 'update']);
Route::get('/todos/{id}', [TodoController::class, 'delete']);
Route::delete('/todos/{id}', [TodoController::class, 'delete']);


Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'update']);
Route::patch('/categories/{id}', [CategoryController::class, 'update']);
Route::get('/categories/delete', [CategoryController::class, 'delete']);
Route::delete('/categories/delete', [CategoryController::class, 'delete']);

Route::get('/todos/search/}', [TodoController::class, 'search']);
