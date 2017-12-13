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
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
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

Route::get('/', function () {
    return view('welcome');
});



/**
 * Product
 */
Route::get('/product/create', 'ProductController@create');
Route::post('/product', 'ProductController@store');

# Edit a product
Route::get('/product/{id}/edit', 'ProductController@edit');
Route::put('/product/{id}', 'ProductController@update');

# Delete a product
Route::get('/product/{id}/delete', 'ProductController@delete');
Route::delete('/product/{id}/destroy', 'ProductController@destroy');

Route::get('/product', 'ProductController@index');
Route::get('/product/{title}', 'ProductController@show');


Auth::routes();

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});

Route::get('/', 'HomeController@index');

Route::resource('cart', 'CartController', ['only' => ['index', 'store', 'destroy']]);
Route::delete('/emptyCart', 'CartController@emptyCart');

Route::post('/order', 'OrderController@store');
Route::get('/order', 'OrderController@index');



