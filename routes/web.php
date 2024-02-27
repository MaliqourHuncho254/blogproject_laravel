<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

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

// Calling the homepage.blade.php
Route::get('/', [HomeController::class, 'homepage']);

// Defining the route to direct us to the home page
Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

// Creating the Post function 
// This was used for the admin side to call the post.blade.php file inside the view folder
// Route::get('post', [HomeController::class,'post'])->middleware(['auth', 'admin']);

// The below route, when commented and run dashboard in my Laravel application, shows the 404 error

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// This route is for post_page
Route::get('/post_page', [AdminController::class, 'post_page']);
// This route is for add_post 
Route::post('/add_post', [AdminController::class, 'add_post']);
// This route is for show_post
Route::get('/show_post', [AdminController::class, 'show_post']);
// This route is for delete_page
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);
// This route is for edit_page
Route::get('/edit_page/{id}', [AdminController::class, 'edit_page']);
// This route is for updating a post
Route::post('/update_post/{id}', [AdminController::class, 'update_post']);
