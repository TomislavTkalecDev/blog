<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

// Route::get('/', [PostController::class, 'index'])->name('home');

// Route::get('posts/{post:slug}', [PostController::class, 'show']);
// Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

// Route::post('newsletter', NewsletterController::class);

// Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
// Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
// Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

// Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// // Admin Section
// Route::middleware('can:admin')->group(function () {
//     Route::resource('admin/posts', AdminPostController::class)->except('show');
// });

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->with('category', 'author')->get(),
        'categories' => Category::all() 
    ]);
});

Route::get('post/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');


Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});


Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author
    ]);
});