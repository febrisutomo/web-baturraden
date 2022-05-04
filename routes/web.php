<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\PostController;

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
//     return view('home');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/destinations', [App\Http\Controllers\DestinationController::class, 'index'])->name('destinations');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [App\Http\Controllers\BlogController::class, 'single'])->name('blog.single');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

Auth::routes([
    'register' => false,
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::resource('/place', PlaceController::class);
    Route::resource('/post', PostController::class);
});

