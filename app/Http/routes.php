<?php

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'PagesController@welcome');
    Route::get('/home', 'PagesController@home');
    Route::get('profile', 'UsersController@showprofile');
    Route::get('editprofile', 'UsersController@editprofile');
    Route::patch('profile/{user}','UsersController@updateprofile');
    Route::get('/racesentered', 'UsersController@racesEntered');

    Route::post('/newhorse', 'HorsesController@store');
    Route::delete('horses/{id}', 'HorsesController@destroy');

    Route::get('calendar', 'EventsController@index');
    Route::get('calendar/{event}', 'EventsController@show');
    Route::get('results/{event}', 'EventsController@results');
    Route::post('/eventsignup', 'EnrollmentsController@create');
    Route::delete('/removeevent/{id}', 'EnrollmentsController@destroy');

    Route::get('standings', 'PagesController@standings');

    Route::get('photos', 'PagesController@photos');

    Route::get('forms', 'UploadedFilesController@index');

});

//Admin
Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('admin', 'AdminController@main');

    Route::get('admin/members', 'UsersController@index');
    Route::get('admin/editmember/{user}', 'UsersController@edit');
    Route::patch('admin/updatemember/{user}', 'UsersController@update');

    Route::get('admin/sponsors', 'SponsorsController@edit');
    Route::post('sponsors', 'SponsorsController@store');
    Route::delete('sponsors/{id}', 'SponsorsController@destroy');

    Route::get('admin/cosanctions', 'CosanctionsController@create');
    Route::post('cosanctions', 'CosanctionsController@store');
    Route::delete('cosanctions/{id}', 'CosanctionsController@destroy');

    Route::get('admin/event', 'EventsController@create');
    Route::post('events', 'EventsController@store');
    Route::get('admin/editevent/{event}', 'EventsController@edit');
    Route::patch('admin/updateevent/{event}','EventsController@update');
    Route::delete('events/{id}', 'EventsController@destroy');

    Route::get('admin/calendar', 'AdminController@calendar');
    Route::get('admin/calendar/{event}', 'AdminController@eventdetails');

    Route::get('admin/addresults/{event}', 'ResultsController@create');
    Route::patch('admin/results/{event}', 'ResultsController@store');
    Route::get('admin/showresults/{event}', 'ResultsController@show');

    Route::get('admin/entries/{event}', 'EntriesController@create');
    Route::post('entries', 'EntriesController@store');
    Route::delete('entry/{id}', 'EntriesController@destroy');

    Route::get('admin/photos', 'PhotosController@edit');
    Route::post('admin/photos', 'PhotosController@add');
    Route::patch('photo/{photo}', 'PhotosController@update');
    Route::delete('deletephoto/{id}', 'PhotosController@destroy');

    Route::get('admin/addFile', 'UploadedFilesController@create');
    Route::post('/addFile', 'UploadedFilesController@store');
});
