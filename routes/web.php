<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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
//It is calling the homepage.blade.php

Route::get('/', [HomeController::class, 'homepage']);

// Defining the route to direct us to the home page
Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

//Creating of Post function 
//I was using this for the admin side to call post.blade.php file which was inside the view folder
/*route::get('post', [HomeController::class,'post'])->middleware(['auth', 'admin']);*/


//The below is the one that once i comment and run dashboard in my laravel application it show the 404 error

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
