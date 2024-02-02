<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TagController;
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
Route::get('/home' , HomeController::class . '@home')->name('home');
// 
// ---------Blog------------
Route::get('/blog' , HomeController::class . '@blog')->name('blog');

Route::get('/create', function() {
    return view('create');
});

Route::get('/upload',function(){
    return view('upload');
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

//..........Auth..............//

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//..................Tag..................//
Route::get('/tag', TagController::class .'@tag')->name('tag');
Route::post('/tags', TagController::class .'@store')->name('tags.store');

Route::post('/store-tag', TagController::class .'@store')->name('store-tag');


// Route::get('/type',function() {
//     return view('type');
// });
Route::get('/type', TypeController::class .'@type')->name('type');
Route::post('/add-types', TypeController::class .'@create')->name('add-types');
Route::post('/types', TypeController::class .'@store')->name('types.store');

Route::post('/store-type', TypeController::class .'@store')->name('store-type');
