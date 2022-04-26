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


# GET podcast
Route::get('/podcasts/{title}', 'GuestController@getPodcast');

# GET About
# Route::view('/about', 'content.about');

# GET Bibliography and References
Route::view('/articles/thewatcher/bibliography', 'content.thewatcher.bibliography');
Route::view('/articles/thewatcher/resources', 'content.thewatcher.references');

Route::view('/articles/highfields/bibliography', 'content.highfields.bibliography');
Route::view('/articles/highfields/references', 'content.highfields.references');

# Route::view('/articles/breezeknoll/bibliography', 'content.breezeknoll.bibliography');

Route::view('/articles/10050cielo/bibliography', 'content.podcast.10050cielo.bibliography');
Route::view('/articles/3301waverly/bibliography', 'content.podcast.3301waverly.bibliography');
Route::view('/articles/watts/bibliography', 'content.podcast.watts.bibliography');
Route::view('/articles/breezeknoll/bibliography', 'content.podcast.breezeknoll.bibliography');

# GET Podcast Directory
Route::view('/podcasts', 'content.podcast.directory');


# REDIRECT
Route::redirect('/thewatcher', '/articles/thewatcher', 301)->name('watcher');
Route::redirect('/highfields', '/articles/highfields', 301)->name('highfields');
Route::redirect('/breezeknoll', '/articles/breezeknoll', 301)->name('breezeknoll');
Route::redirect('/10050cielo', '/articles/10050cielo', 301)->name('10050cielo');
Route::redirect('/3301waverly', '/articles/3301waverly', 301)->name('3301waverly');
Route::redirect('/watts', '/articles/watts', 301)->name('watts');

# REDIRECT landing page to The Watchers
# Route::redirect('/', '/highfields', 301)->name('home');

# REDIRECT away from register page
// Route::redirect('/register', '/thewatcher', 301);

Route::view('/', 'content.welcome');
