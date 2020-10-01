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
Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

# POST: upload new file
Route::post('/upload', 'FileController@store')->name('upload');

# POST save new post
Route::post('/post', 'PostController@store')->name('post.store');

# GET watch video file
Route::get('/watch/{hash}', 'MediaController@watch')->name('watch');

# POST update view count
Route::post('/watch/view', 'MediaController@addView');

# Authentication Routes
Auth::routes();

# GET homepage
Route::get('/home', 'HomeController@index')->name('home');

# GET landing page
Route::get('/', function () {
    return view('welcome');
});
