<?php

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
    return redirect('/blog');
});

Route::get('/blog', '\App\Http\Controllers\BlogController@index')->name('blog.home');
Route::get('/blog/{slug}', '\App\Http\Controllers\BlogController@showPost')->name('blog.detail');

//后台路由
Route::get('/admin', function (){
    return redirect('/admin/post');
});
Route::middleware('auth')->namespace('Admin')->group(function () {
    Route::resource('/admin/post', '\App\Http\Controllers\Admin\PostController', ['except' => 'show']);
    Route::resource('/admin/tag', '\App\Http\Controllers\Admin\TagController', ['except' => 'show']);
    Route::get('/admin/upload', '\App\Http\Controllers\Admin\UploadController@index');

    // 添加如下路由
    Route::post('admin/upload/file', 'UploadController@uploadFile');
    Route::delete('admin/upload/file', 'UploadController@deleteFile');
    Route::post('admin/upload/folder', 'UploadController@createFolder');
    Route::delete('admin/upload/folder', 'UploadController@deleteFolder');
});

//登录 退出
Route::get('/login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//联系我们
Route::get('/contact', 'ContactController@showForm');
Route::post('/contact', 'ContactController@sendContactInfo');

//rss
Route::get('rss', 'BlogController@rss');

//sitemap
Route::get('sitemap.xml', 'BlogController@siteMap');