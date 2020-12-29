<?php

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
//Route::get("/",function (){
//    return view("fbLogin");
//});

Route::get('auth/{provider}', 'FacebookLoginController@redirect');
Route::get('auth/{provider}/callback', 'FacebookLoginController@callback');


Route::get("/","PageController@index")->name("page");
Route::get("/blog/show","PageController@blog")->name("blog.show");
Route::get('/search_post','PageController@search')->name('search');
Route::get('/search_post/category/{catId}','PageController@searchCategory')->name('search.category');


Route::get("/blog/{id}/details","PageController@blogDetail")->name("blog.detail");
Route::get("/home","HomeController@index");
Route::post("/post-like/{postId}","LikeController@like")->name("like");
Route::post("/post-dislike/{postId}","LikeController@disLike")->name("dislike");
Route::post("/post-comment/{postId}","CommentController@comment")->name("comment");
Route::get("/comment-list/{postId}","CommentController@show")->name("comment.show");

Auth::routes();

Route::prefix("admin-panel")->middleware(["auth","isAdmin"])->group(function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::delete('/users/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/users/{id}/update', 'UserController@update')->name('user.update');

//    skill
    Route::resource("/about","AboutController");
    Route::resource("/certificate","CertificateController");
    Route::resource("/skill","SkillController");
    Route::resource("/project","ProjectController");
    Route::resource("/category","CategoryController");
    Route::resource("/post","PostController");
    Route::post("comment/{id}/show_hide","PostController@showHide")->name('show-hide');
});

