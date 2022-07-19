<?php

/*
Route::group(['middleware' => 'auth'], function () {

    # POST save new post
    Route::post('/post', 'PostController@store')->name('post.store');

    Route::view('/panel', 'panel.index')->middleware('admin')->name('panel');

    # GET homepage
    Route::get('/home', 'HomeController@index')->name('home');
});

*/
# POST save new post
Route::post('/post', 'PostController@store')->name('post.store');

Route::view('/panel', 'panel.index')->middleware('admin')->name('panel');

Route::resource('podcasts', 'PodcastController');

Route::resource('images', 'ImageController');

# GET homepage
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/podcasts/{podcast}/images/create', 'PodcastController@storeImage')->name('podcasts.image.store');