<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/demo/{lastname?}/{id?}', function ($lastname, $id = null) {
//     echo $lastname, " ";
//     echo $id;

// });

// Route::get('/{name?}', function ($name = null) {
//     $friends = "<h2> Sneha </h2>";
//     $data = compact('name', 'friends'); // ['name' => $name]
//     return view('home')->with($data);
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



