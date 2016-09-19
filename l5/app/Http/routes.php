<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('now', function () {
    return date("Y-m-d H:i:s");
});

Route::auth();

// Route::get('/home', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('article', 'ArticleController@index');
});

Route::get('user/as', ['as' => 'test', function () {
    return 'test "as"';
}]);

Route::get('user/{user}/name/{name?}', function ($user,$name='abc') {
    return "user: $user, name: $name";
})
->where('name', '[A-Za-z]+');

Route::group(['middleware' => 'auth'], function () {
    Route::get('user/test', function ()    {
        return "use auth middleware";
    });

    Route::get('user/profile', function () {
        return "use auth middleware";
    });
});