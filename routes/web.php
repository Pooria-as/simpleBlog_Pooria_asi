<?php

use Illuminate\Support\Facades\Auth;
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


Route::resource('category', "CategoryController")->middleware("auth");
Route::resource('posts', "PostController")->middleware("auth");
Route::get("trash-post","PostController@trash")->name("trash-post");
Route::put("trash-post/{id}/restore","PostController@restore")->name("restore-post");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
