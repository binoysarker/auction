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



Route::get('/', 'HomeController@index')->name('home');
Route::get('/item-detail/{id}', 'HomeController@show');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/news', 'HomeController@news');


Route::group(['prefix' => 'admin'], function () use ($router) {
  // admin section
  Route::get('/','AdminController@index');
  Route::get('/all-items','AdminController@showAllItems');
  Route::get('/create-item','AdminController@createItem');
  Route::post('/save-item','AdminController@store');
  Route::get('/auction_item/{id}/edit','AdminController@edit');
  Route::post('/update-item/{id}','AdminController@update');
  Route::post('/auction_item/{id}/delete','AdminController@delete');

  // new section
  Route::post('/save-news','NewsController@store');
  Route::get('/all-news','NewsController@index');
  Route::get('/add-new-news','NewsController@create');
  Route::get('/news_item/{id}/edit','NewsController@edit');
  Route::post('/update-news-item/{id}','NewsController@update');
  Route::post('/news_item/{id}/delete','NewsController@delete');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
