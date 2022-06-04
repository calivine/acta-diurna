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



# Authentication Routes
Auth::routes(['register' => false]);

# Comment Routes
Route::resource('comments', 'CommentController');

# POST update Page theme setting
Route::post('/theme', 'GuestController@changeTheme')->name('theme');


# GET podcast


# REDIRECT landing page to The Watchers
# Route::redirect('/', '/highfields', 301)->name('home');

# REDIRECT away from register page
// Route::redirect('/register', '/thewatcher', 301);

// Route::redirect('/register', '/', 301);

// Route::view('/', 'content.welcome');
Route::view('/', 'content.podcast.directory');