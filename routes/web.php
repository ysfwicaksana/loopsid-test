<?php

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
use App\Http\Controllers\BlogController;


Route::get('/', [BlogController::class, 'content_post']);
Route::get('/{slug}', [BlogController::class, 'read_more'])->name('read-more');

Route::get('/user-list', [BlogController::class, 'user_list']);
Route::get('/comment-guest', [BlogController::class, 'comment_guest']);
