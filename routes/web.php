<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Auth\CustomAuthController;
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
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home' , HomeController::class . '@home')->name('home')->middleware('auth');
// 
// ---------Blog------------
Route::get('/blog' , HomeController::class . '@blog')->name('blog');

Route::get('/create', function() {
    return view('create');
});

Route::get('/upload',function(){
    return view('upload');
});

Route::post('/store-blog', HomeController::class. '@store')->name('store-blog')->middleware('auth');

// deletes a post
Route::get('/delete-home/{id}', HomeController::class .'@delete')->name('delete-home');

// returns the form for editing a post
Route::get('/edit-home/{id}', HomeController::class .'@edit')->name('edit-home');


// returns the home page with all posts
// Route::get('/', HomeController::class .'@index')->name('posts.index');
// returns the form for adding a post
Route::get('/posts/create', HomeController::class . '@create')->name('posts.create');
// adds a post to the database
Route::post('/posts', HomeController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{post}', HomeController::class .'@show')->name('posts.show');

// updates a post
Route::post('/update-home/{id}', HomeController::class .'@update')->name('update-home');

//..........Auth..............//

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//..................Tag..................//
Route::get('/tag', TagController::class .'@tag')->name('tag')->middleware('auth');
Route::post('/tags', TagController::class .'@store')->name('tags.store');

Route::post('/store-tag', TagController::class .'@store')->name('store-tag');
Route::get('/delete-tag/{id}', TagController::class .'@delete')->name('delete-tag');
Route::get('/edit-tag/{id}', TagController::class .'@edit')->name('edit-tag');
Route::post('/update-tag/{id}', TagController::class .'@update')->name('update-tag');
// ..................Type..................//
Route::get('/type', TypeController::class .'@type')->name('type')->middleware('auth');
Route::post('/add-types', TypeController::class .'@create')->name('add-types');
Route::post('/types', TypeController::class .'@store')->name('types.store');

Route::post('/store-type', TypeController::class .'@store')->name('store-type');

Route::get('/delete-type/{id}', TypeController::class .'@delete')->name('delete-type');
Route::get('/edit-type/{id}', TypeController::class .'@edit')->name('edit-type');
Route::post('/update-type/{id}', TypeController::class .'@update')->name('update-type');

//..................Status..................//
Route::get('/changeStatus/{id}', HomeController::class . '@changeStatus')->name('changeStatus');

//..................Custom Auth..................//
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');