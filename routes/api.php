<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'auth:api'], function () {
    //auth
    Route::get('/user', 'AuthController@user');
    Route::post('/logout', 'AuthController@logout');

    //machines
    Route::get('/machines', 'Api\MachineController@index');
    Route::post('/machine/create', 'Api\MachineController@store');
    Route::put('/machine/{id}', 'Api\MachineController@update');
    Route::delete('/machine/{id}', 'Api\MachineController@destroy');

    //departments
    Route::get('/departments', 'Api\DepartmentController@index');
    Route::post('/department/create', 'Api\DepartmentController@store');
    Route::put('/department/{id}', 'Api\DepartmentController@update');
    Route::delete('/department/{id}', 'Api\DepartmentController@destroy');

});

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::get('/{label}', 'Api\MachineController@show');
Route::get('/timer/{label}', 'Api\TimerController@index');
