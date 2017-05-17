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



//route get login
Route::get('/login', 'UserController@getLogin')->name('login');

//route post login
Route::post('/login-post', 'UserController@postLogin')->name('login-post');

//route get register
Route::get('/register', 'UserController@getRegister')->name('register');

//route post login
Route::post('/register-post', 'UserController@postRegister')->name('register-post');

Route::get('/', 'HomeController@index')->name('index');
Route::get('/category/{id}', 'HomeController@category')->name('category');
Route::post('/search', 'HomeController@search')->name('search');


Route::group(['middleware' => ['auth']], function () {


    Route::get('/logout', 'UserController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/categories', 'DashboardController@getCategories')->name('categories');
    Route::get('/add-category', 'DashboardController@getAddCategory')->name('add-category');
    Route::post('/add-category-post', 'DashboardController@postAddCategory')->name('add-category-post');
    Route::post('/delete-category-post', 'DashboardController@postDeleteCategory')->name('delete-category-post');
    Route::get('/update-category/{id}', 'DashboardController@getUpdateCategory')->name('update-category');
    Route::post('/update-category-post', 'DashboardController@postUpdateCategory')->name('update-category-post');

    Route::get('/products', 'DashboardController@getProducts')->name('products');
    Route::get('/add-product', 'DashboardController@getAddProduct')->name('add-product');
    Route::post('/add-product-post', 'DashboardController@postAddProduct')->name('add-product-post');
    Route::post('/delete-product-post', 'DashboardController@postDeleteProduct')->name('delete-product-post');
    Route::get('/update-product/{id}', 'DashboardController@getUpdateProduct')->name('update-product');
    Route::post('/update-product-post', 'DashboardController@postUpdateProduct')->name('update-product-post');
    Route::get('/reports', 'DashboardController@getReports')->name('reports');


    Route::post('/report-product', 'DashboardController@postReportProduct')->name('report-product');
    Route::get('/users', 'UserController@getAllUsers')->name('users');
    Route::post('/delete-user-post', 'UserController@postDeleteUser')->name('delete-user-post');

    Route::get('/messages', 'DashboardController@getMessages')->name('messages');
    Route::post('/delete-message-post', 'DashboardController@postDeleteMessage')->name('delete-message-post');


    Route::get('/send-message/{id}', 'DashboardController@getSendMessage')->name('send-message');
    Route::post('/send-message-post', 'DashboardController@postSendMessage')->name('send-message-post');
    Route::get('/message/{id}', 'DashboardController@getMessage')->name('message');


});

