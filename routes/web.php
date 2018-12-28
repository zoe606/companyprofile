<?php

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/home', 'HomeController@index')->name('home');

// method resource berfungi membuatkan otomatis method yang ada pada controller (inde,show,create,store,edit,update,destroy)
Route::resource('/admin/users', 'UsersController', ['as' => 'admin']);
// array as (prefix) befungsi untuk menampilkan semua haman menjadi awalan admin.NamaController.NamaFile
Route::resource('/admin/categories', 'CategoriesController', ['as' => 'admin']);
Route::resource('/admin/posts', 'PostsController', ['as' => 'admin']);


Route::get('/api/datatable/users', 'UsersController@dataTable')->name('api.datatable.users');
Route::get('/api/datatable/categories', 'CategoriesController@dataTable')->name('api.datatable.categories');
Route::get('/api/datatable/posts', 'PostsController@dataTable')->name('api.datatable.posts');

