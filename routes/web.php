<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
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

// ---- undefined route -----
// Route::get('/Browser', function () { return view('page.public.browse'); });

Route::get('/post/detail', function () {
    return view('page.public.detailpost');
});

/* This contain route to test the view design */

// ----- unauthorize setting ----
Route::get('/confirm', function () {
    return view('auth.passwords.confirm');
});

Route::get('/reset', function () {
    return view('auth.passwords.reset');
});

Route::get('/email', function () {
    return view('auth.passwords.email');
});

Route::get('/news', function () {
    return view('page.public.news');
});

// ---- Main route -----

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/user', [App\Http\Controllers\ProfileController::class, 'index'])->name('user.index');
    Route::get('/user/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('user.edit');
    Route::put('/user/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('user.update');

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/edit/{user}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/update/{user}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/destroy/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
        Route::post('/admin/{user}/avatarstore', [AdminController::class, 'Avatarstore'])->name('admin.avatarstore');

    });

});

Auth::routes();
// ----- landing page ----
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('user.index');
// ---- Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home'); ----
Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');

// ----- profile picture -----
/* Route::get( '/profile/store', function () { return view( 'user.index-store' ); } ); */
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('user.index.store');
Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'deleteAvatar'])->name('user.index.deleteAvatar');

//----- profile update -----
Route::get('/profile/management', function () {return view('user.management');});
Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

//----- update page -----
Route::get('/profile/update', [App\Http\Controllers\HomeController::class, 'userupdate'])->name('user.update');

//----- category page ----
Route::get('/category/template', function () {return view('page.category.category-template');});
Route::get('/category/photography', [App\Http\Controllers\HomeController::class, 'categoryphotography'])->name('page.category.photography');

//----- browser page -----
Route::get('/browse', [BrowseController::class, 'index'])->name('browse.index');
Route::get('/browse/search', [BrowseController::class, 'search'])->name('browse.search');

//----- user page -----
Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');

// ---- category page ----
// Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/category', [CategoryController::class, 'showCategory'])->name('show.category');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');





// ---- posts page ----
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::resource('posts', PostController::class);
Route::post('post-images', [PostImageController::class, 'store'])->name('post-images.store');
Route::delete('post-images/{image}', [PostImageController::class, 'destroy'])->name('post-images.destroy');

// ----- post extras page -----
Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::get('/home', [PostController::class, 'showTopVote'])->name('posts.topVote');
Route::get('/', [PostController::class, 'showTopVote'])->name('posts.topVote');
Route::get('/news', [PostController::class, 'news'])->name('posts.news');

// ------ post comments page ------
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');





// ---- landing page -----
Route::get('/home', [PostController::class, 'home'])->name('home');
Route::get('/profile', [PostController::class, 'profileindex'])->name('index');
Route::get('/', [PostController::class, 'home'])->name('home');
Route::get('/user/{user}', [ProfileController::class, 'profile'])->name('profile');
