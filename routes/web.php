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


Route::get('/home' , HomeController::class . '@index')->name('home');

// ---------Blog------------
Route::get('/blog' , HomeController::class . '@blog')->name('blog');


Route::get('/create', function() {
    return view('create');
});

