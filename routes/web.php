<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/',[PagesController::class, 'index'])->name('index');
Route::post('comment/{id}',['uses'=>'App\Http\Controllers\PagesController@addcomment','middleware'=>'auth'])->name('comment');
Route::get('/category/{id}',[PagesController::class, 'viewCategory'])->name('category');
Route::get('/book/{id}',[PagesController::class, 'viewBook'])->name('book');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/upload', ['uses'=>'App\Http\Controllers\UploadController@index','middleware'=>'roles','roles'=>['admins','users']])->name('upload');
Route::post('/upload', ['uses'=>'App\Http\Controllers\UploadController@upload','middleware'=>'roles','roles'=>['admins','users']])->name('upload.save');

Route::group(['prefix' => 'admin', 'middleware' => 'roles', 'roles' => 'admins'], function(){
    Route::resource('users', AdminUsersController::class);
    Route::resource('categories', AdminCategoryController::class);
});
