<?php

declare(strict_types=1);

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->group(function() {
    Route::get('/', 'allPosts')->name('home');

    Route::prefix('post')->name('post.')->group(function() {
        Route::get('/{post:id}', 'post')->name('page');

        Route::get('/{post:id}/delete', 'deletePost')->name('delete');
        Route::get('/{post:id}/edit', 'editPost')->name('edit');
    });

    Route::get('/create', 'createPost')->name('create');
    Route::post('/edit', 'storePost')->name('store');
});

Route::controller(CommentController::class)->name('comment.')->group(function() {
    Route::get('/comment/{postId}/{comment:id}/delete', 'delete')->name('delete');
    Route::post('/comment/store', 'store')->name('store');
});
