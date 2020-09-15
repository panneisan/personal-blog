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
//    return view("welcome");
//});

Route::get("/","PageController@index");
Route::get("/blog","PageController@blog")->name("blog.show");
Route::get("/blog-detail","PageController@blogDetail")->name("blog.detail");
Route::get("/home","HomeController@index");
Auth::routes();

Route::prefix("admin-panel")->middleware(["auth","isAdmin"])->group(function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::delete('/users/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/users/{id}/update', 'UserController@update')->name('user.update');

//    skill
    Route::resource("skill","SkillController");
});

