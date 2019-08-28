<?php
use  App\Http\Middleware\CheckAuth;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('pages/about');
});

Route::get('/services', function () {
    return view('pages/services');
});

Route::get('/c/dashboard', 'ClientController@index' );
Route::get('/u/dashboard', 'UserController@index' );

Route::get(	'/c/login', 'ClientController@clientLogin' );
Route::post('/c/login', 'AuthController@clientLogin' );

Route::get(	'/c/signup', 'ClientController@create' );
Route::post('/c/signup', 'ClientController@store' );


Route::get(	'/c/edit/{id}', [ 'as' => 'Client.edit', 'uses' => 'ClientController@edit']);
Route::post('/c/edit/{id}', [ 'as' => 'Client.update', 'uses' => 'ClientController@update']);
// Route::post('/c/edit', 'ClientController@update' );


Route::get(	'/u/login', 'UserController@userLogin' );
Route::post('/u/login', 'AuthController@userLogin' );

Route::get(	'/u/signup', 'UserController@create' );
Route::post('/u/signup', 'UserController@store' );


Route::get('/logout', 'AuthController@logout' );
