<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', PostController::class);
Route::post('post/{post}/toggle-publish', [PostController::class, 'togglePublish'])->name('posts.togglePublish');
Route::post('post/{post}/comments', [PostController::class, 'createComment'])->name('post.comments.create');
Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('comments/{comment}/modered', [CommentController::class, 'modered'])->name('comments.modered');