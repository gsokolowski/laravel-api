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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/v1'], function()
{
    Route::resource('lessons', 'LessonsController');
});

/*
 *
 * php artisan route:list

+--------+-----------+-------------------------------+------------------------+------------------------------------------------+------------+
| Domain | Method    | URI                           | Name                   | Action                                         | Middleware |
+--------+-----------+-------------------------------+------------------------+------------------------------------------------+------------+
|        | GET|HEAD  | /                             |                        | Closure                                        | web        |
|        | POST      | api/v1/lessons                | api.v1.lessons.store   | App\Http\Controllers\LessonsController@store   | web        |
|        | GET|HEAD  | api/v1/lessons                | api.v1.lessons.index   | App\Http\Controllers\LessonsController@index   | web        |
|        | GET|HEAD  | api/v1/lessons/create         | api.v1.lessons.create  | App\Http\Controllers\LessonsController@create  | web        |
|        | DELETE    | api/v1/lessons/{lessons}      | api.v1.lessons.destroy | App\Http\Controllers\LessonsController@destroy | web        |
|        | PUT|PATCH | api/v1/lessons/{lessons}      | api.v1.lessons.update  | App\Http\Controllers\LessonsController@update  | web        |
|        | GET|HEAD  | api/v1/lessons/{lessons}      | api.v1.lessons.show    | App\Http\Controllers\LessonsController@show    | web        |
|        | GET|HEAD  | api/v1/lessons/{lessons}/edit | api.v1.lessons.edit    | App\Http\Controllers\LessonsController@edit    | web        |
+--------+-----------+-------------------------------+------------------------+------------------------------------------------+------------+
*/