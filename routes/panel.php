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

// Route::view('/panel', 'panel.index')->middleware('admin')->name('panel');

Route::get('/panel', 'PodcastController@panelIndex')->middleware('admin')->name('panel');

Route::resource('podcasts', 'PodcastController');

Route::resource('images', 'ImageController');

Route::resource('podcasts.images', 'ImageController');

# GET homepage
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/podcasts/{podcast}/publish', 'PodcastController@publish')->name('podcasts.publish');

Route::post('/podcasts/{podcast}/reference', 'PodcastController@storeReference')->name('podcasts.reference.store');

Route::get('/swap', 'ImageController@setOrder');
