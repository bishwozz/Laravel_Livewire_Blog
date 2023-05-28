<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\BlogPost;
use App\Http\Livewire\PostList;
use App\Http\Livewire\LoginRegister;
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



// Redirect to the login page if not logged in
Route::middleware('guest')->redirect('/', '/login');

// Redirect to the blog page if already logged in
Route::middleware('auth')->redirect('/', '/blog');

Route::get('/login', LoginRegister::class)->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [PostList::class, 'logout'])->name('logout');
    Route::get('/blog', PostList::class)->name('blog');
    Route::get('/post/{id}/details', [PostList::class, 'postDetails'])->name('post.details');
});


