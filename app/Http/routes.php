<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@home');

Route::get('calendar', 'EventsController@index');
Route::get('calendar/{event}', 'EventsController@show');

Route::get('standings', 'PagesController@standings');

Route::get('hats', 'PagesController@hats');

Route::get('artwork', 'PagesController@artwork');

Route::get('photos', 'PagesController@photos');

Route::get('contact', 'PagesController@contact');

Route::get('admin/event', function() {
    return view('admin.addEvent');
});

Route::post('events', 'EventsController@store');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
