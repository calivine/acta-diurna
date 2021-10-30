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

Route::group(['middleware' => 'auth'], function () {

    # POST save new post
    Route::post('/post', 'PostController@store')->name('post.store');

    # GET homepage
    Route::get('/home', 'HomeController@index')->name('home');
});

# Authentication Routes
Auth::routes();

# Comment Routes
Route::resource('comments', 'CommentController');

# POST update Page theme setting
Route::post('/theme', 'GuestController@changeTheme')->name('theme');

# GET article
Route::get('/articles/{title}', 'GuestController@getArticle');

# GET About
# Route::view('/about', 'content.about');

# GET TheWatcher bibliography
Route::view('/articles/thewatcher/bibliography', 'content.thewatcher.bibliography');
Route::view('/articles/thewatcher/resources', 'content.thewatcher.references');

Route::view('/articles/highfields/bibliography', 'content.highfields.bibliography');
Route::view('/articles/highfields/references', 'content.highfields.references');

Route::view('/articles/breezeknoll/bibliography', 'content.breezeknoll.bibliography');


# REDIRECT
Route::redirect('/thewatcher', '/articles/thewatcher', 301)->name('watcher');
Route::redirect('/highfields', '/articles/highfields', 301)->name('highfields');
Route::redirect('/breezeknoll', '/articles/breezeknoll', 301)->name('breezeknoll');



# REDIRECT landing page to The Watchers
# Route::redirect('/', '/highfields', 301)->name('home');

# REDIRECT away from register page
// Route::redirect('/register', '/thewatcher', 301);

Route::view('/', 'content.welcome');
