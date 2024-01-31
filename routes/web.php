<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/home', function () {
//     Route::get('/home', [HomeController::class, 'home'])->name('home');
//     // return view('welcome');
//     return redirect('/home');
// });
Route::get('/home' , HomeController::class . '@home')->name('home');

// ---------Blog------------
Route::get('/blog' , HomeController::class . '@blog')->name('blog');


Route::get('/create', function() {
    return view('create');
});

Route::post('/store-blog', HomeController::class. '@store')->name('store-blog');

// deletes a post
Route::get('/delete/{id}', HomeController::class .'@delete')->name('delete');

// returns the form for editing a post
Route::get('/edit/{id}', HomeController::class .'@edit')->name('edit');



// returns the home page with all posts
// Route::get('/', HomeController::class .'@index')->name('posts.index');
// returns the form for adding a post
Route::get('/posts/create', HomeController::class . '@create')->name('posts.create');
// adds a post to the database
Route::post('/posts', HomeController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{post}', HomeController::class .'@show')->name('posts.show');

// updates a post
Route::get('/update/{id}', HomeController::class .'@update')->name('update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
