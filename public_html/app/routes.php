<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/{lang?}', array('uses' => 'HomeController@index'))->where(['lang' => 'ru|en']);

Route::group(array('before' => 'auth'), function () {
    Route::get('admin', function () {
        return View::make('admin.index');
    });
});
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::post('upload-avatar', array('uses' => 'ImageController@uploadAvatar'));
Route::post('upload-article-img', array('uses' => 'ImageController@uploadArticleImg'));

Route::resource('portfolio', 'PortfolioController', array('only' => array('index')));

Route::get('blog/published', 'BlogController@published');

Route::group(array('prefix' => 'api'), function () {
    Route::resource('comments', 'CommentController',
        array('only' => array('index', 'show', 'edit', 'store', 'destroy', 'update')));
    Route::resource('blog', 'BlogController');
});

App::missing(function ($exception) {
    return View::make('index');
});

