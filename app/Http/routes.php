<?php

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'PagesController@home');

    Route::get('calendar', 'EventsController@index');
    Route::get('calendar/{event}', 'EventsController@show');
    Route::post('/signup', 'EventsController@signup');

    Route::get('standings', 'PagesController@standings');

    Route::get('photos', 'PagesController@photos');

    Route::get('contact', 'PagesController@contact');



//Admin
    Route::get('admin', 'AdminController@main');

    Route::get('admin/sponsors', 'AdminController@sponsors');
    Route::post('sponsors', 'SponsorsController@store');
    Route::delete('sponsors/{id}', 'SponsorsController@destroy');

    Route::get('admin/event', 'AdminController@event');
    Route::post('events', 'EventsController@store');
    Route::get('admin/calendar', 'AdminController@calendar');
    Route::get('admin/calendar/{event}', 'AdminController@results');

    Route::get('admin/photos', 'PhotosController@edit');
    Route::post('admin/photos', 'PhotosController@add');
    Route::patch('photo/{photo}', 'PhotosController@update');
});
