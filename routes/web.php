<?php

use App\Http\Controllers\Blog\PostController;
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

Route::get("/","WelcomeController@index")->name("WelcomePage");
Route::get("/Category/{category}/Related","WelcomeController@showRelatedCategoryPost")->name("RelatedCategoryPost");
Route::get("/tag/{tag}/Related","WelcomeController@showRelatedTagPost")->name("RelatedtagPost");

Route::get("/Blog/Post/{post}","Blog\PostController@index")->name("blogSinglePost");


Route::resource('category', "CategoryController")->middleware("auth");
Route::resource('tag', "TagController")->middleware("auth");
Route::resource('posts', "PostController")->middleware("auth");
Route::get("trash-post","PostController@trash")->name("trash-post")->middleware("auth");
Route::put("trash-post/{id}/restore","PostController@restore")->name("restore-post")->middleware("auth");


Route::middleware("auth","IsAdmin")->group(function () {

Route::post("comment/{post}","CommentController@create")->name("comments.create");
Route::get("comments","CommentController@index")->name("comments.index");
Route::put("comments/{id}/Approve","CommentController@Approve")->name("comments.Approve");
Route::put("comments/{id}/unApprove","CommentController@UnApprove")->name("comments.UnApprove");
Route::delete("comments/{id}","CommentController@destroy")->name("comments.destroy");
    
});



Route::get("users","UserController@index")->name("users.index")->middleware(['auth','IsAdmin']);
Route::put("users/{id}/Make-Admin","UserController@MakeAdmin")->name("makeAdmin")->middleware(['auth','IsAdmin']);
Route::get("User/Profile","UserController@Profile")->name("profile")->middleware(['IsAdmin','auth']);
Route::put("User/Profile/update","UserController@updateProfile")->name("Updateprofile")->middleware(['IsAdmin','auth']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
