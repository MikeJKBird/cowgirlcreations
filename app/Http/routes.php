<?php

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'PagesController@home');
    Route::get('/profile', 'UsersController@showprofile');
    Route::get('/editprofile', 'UsersController@editprofile');
    Route::patch('profile/{user}','UsersController@updateprofile');

    Route::post('/newhorse', 'HorsesController@store');
    Route::delete('horses/{id}', 'HorsesController@destroy');

    Route::get('calendar', 'EventsController@index');
    Route::get('calendar/{event}', 'EventsController@show');
    Route::post('/eventsignup', 'EnrollmentsController@create');
    Route::delete('/removeevent/{id}', 'EnrollmentsController@destroy');

    Route::get('standings', 'PagesController@standings');

    Route::get('photos', 'PagesController@photos');

    Route::get('contact', 'PagesController@contact');

});

//Admin
Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('admin', 'AdminController@main');

    Route::get('admin/members', 'UsersController@index');
    Route::get('admin/editmember/{user}', 'UsersController@edit');
    Route::patch('admin/updatemember/{user}', 'UsersController@update');

    Route::get('admin/sponsors', 'AdminController@sponsors');
    Route::post('sponsors', 'SponsorsController@store');
    Route::delete('sponsors/{id}', 'SponsorsController@destroy');

    Route::get('admin/event', 'AdminController@event');
    Route::post('events', 'EventsController@store');
    Route::get('admin/calendar', 'AdminController@calendar');
    Route::get('admin/calendar/{event}', 'AdminController@eventdetails');
    Route::get('admin/addresults/{event}', 'ResultsController@create');
    Route::patch('admin/results/{event}', 'ResultsController@store');
    Route::get('admin/showresults/{event}', 'ResultsController@show');

    Route::get('admin/photos', 'PhotosController@edit');
    Route::post('admin/photos', 'PhotosController@add');
    Route::patch('photo/{photo}', 'PhotosController@update');
});
