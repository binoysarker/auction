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


/**
 * Font End section start
 */

Route::get('/', 'HomeController@index')->name('home');
Route::get('/item-detail/{id}', 'HomeController@show');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/news', 'HomeController@news');
Route::post('/search-items', 'HomeController@searchItem');

// BidInfo section start
Route::post('/start-bid','BidInfoController@store')->name('start-bid');

/**
* Font End section end
*/

/**
* Back End section start
*/

Route::group(['prefix' => 'admin','middleware'=>'checkUser'], function () use ($router) {
  // admin section
  Route::get('/','AdminController@index');
  Route::get('/all-items','AdminController@showAllItems');
  Route::get('/create-item','AdminController@createItem');
  Route::post('/save-item','AdminController@store');
  Route::get('/auction_item/{id}/edit','AdminController@edit');
  Route::post('/update-item/{id}','AdminController@update');
  Route::post('/auction_item/{id}/delete','AdminController@delete');

  // news section
  Route::post('/save-news','NewsController@store');
  Route::get('/all-news','NewsController@index');
  Route::get('/add-new-news','NewsController@create');
  Route::get('/news_item/{id}/edit','NewsController@edit');
  Route::post('/update-news-item/{id}','NewsController@update');
  Route::post('/news_item/{id}/delete','NewsController@delete');

  // terms and condition section
  Route::get('/add-terms-condition','TermsConditionController@create');
  Route::post('/save-terms-condition','TermsConditionController@store');
  Route::get('/edit-terms-condition/{id}','TermsConditionController@edit');
  Route::post('/update-terms-condition/{id}','TermsConditionController@update');

  // bilboard section
  Route::get('/all-bilboard-message','BilboardMessageController@index');
  Route::get('/add-bilboard-message','BilboardMessageController@create');
  Route::post('/save-bilboard-message','BilboardMessageController@store');
  Route::post('/edit-bilboard-message/{id}','BilboardMessageController@edit');
  Route::get('/edit-bilboard-message/{id}','BilboardMessageController@edit');
  Route::post('/update-bilboard-message/{id}','BilboardMessageController@update');
  Route::post('/delete-bilboard-message/{id}','BilboardMessageController@delete');



});

/**
* Back End section end
*/

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
