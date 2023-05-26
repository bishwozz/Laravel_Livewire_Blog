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

Route::get('/', function () {
    return view('welcome');
});

// Route::view('/login', 'livewire.main')->name('home');



// Route::get('/login', LoginRegister::class)->name('login');

// Route::get('/home', Home::class)->name('home');

// Route::get('/create-post', BlogPost::class)->name('create-post');

// Route::get('home/post/{id}/details', 'App\Http\Livewire\Home@postDetails')->name('post.details');

// Route::get('post/{id}/edit', 'App\Http\Livewire\BlogPost@postEdit')->name('post.edit');
// Route::get('post/{id}/delete', 'App\Http\Livewire\Home@postDelete')->name('post.delete');


////// exter


Route::get('/login', LoginRegister::class)->name('login');


 Route::middleware(['auth'])->group(function () {
    
    Route::get('/logout', 'App\Http\Livewire\PostList@logout')->name('logout');
    Route::get('/blog', PostList::class)->name('blog');
    Route::get('home/post/{id}/details', 'App\Http\Livewire\Home@postDetails')->name('post.details');
    Route::get('post/{id}/edit', 'App\Http\Livewire\BlogPost@postEdit')->name('post.edit');
    Route::get('post/{id}/delete', 'App\Http\Livewire\Home@postDelete')->name('post.delete');
});

