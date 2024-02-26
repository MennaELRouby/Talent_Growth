<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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




Route::group(['middleware' => ['verified']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('postlist', [PostController::class, 'index'])->name('postlist');
    Route::get('addpost', [PostController::class, 'create'])->name('addpost');
    Route::post('post', [PostController::class, 'store'])->name('post');
    Route::get('editpost/{id}', [PostController::class, 'edit'])->name('editpost');
    Route::put('editpost/{id}', [PostController::class, 'update'])->name('updatepost');
    Route::get('deletepost/{id}', [PostController::class, 'destroy'])->name('deletepost');

    Route::get('postsingle/{id}', [PostController::class, 'show'])->name('postsingle');
    Route::post('comment', [CommentController::class, 'store'])->name('comment');
    Route::put('updatecomment/{id}', [CommentController::class, 'update'])->name('updatecomment');
    Route::delete('deletecomment/{id}', [CommentController::class, 'destroy'])->name('deletecomment');
    Route::get('allposts', [PostController::class, 'allposts'])->name('allposts');
});
Auth::routes(['verify' => true]);
