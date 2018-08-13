<?php

Route::middleware('guest')->group(function () {
    Route::get('login/facebook', 'OAuth\FacebookController@redirect');
    Route::get('login/facebook/callback', 'OAuth\FacebookController@callback');
    Route::get('login/google', 'OAuth\GoogleController@redirect');
    Route::get('login/google/callback', 'OAuth\GoogleController@callback');
});

Route::get('logout', 'HomeController@logout')->name('logout.confirm');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile', 'AccountController@profile')->name('profile');
Route::post('profile', 'AccountController@updateProfile');
Route::get('password', 'AccountController@password')->name('password');
Route::post('password', 'AccountController@updatePassword');
Route::get('activity', 'AccountController@activity')->name('activity');
Route::resource('activities', 'ActivityController');
Route::delete('activities', 'ActivitiesController')->name('activities.delete');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController', ['except' => ['destroy']]);
Route::resource('notifications', 'NotificationController');
Route::post('import/users', 'UserController@import')->name('users.import');