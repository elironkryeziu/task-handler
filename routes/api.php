<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function () {

    //auth
    Route::get('/user', 'AuthController@user');
    Route::post('/logout', 'AuthController@logout');

    //machines
    Route::post('/machine/create', 'Api\MachineController@store');
    Route::put('/machine/{id}', 'Api\MachineController@update');
    Route::delete('/machine/{id}', 'Api\MachineController@destroy');
    
    //departments
    Route::get('/departments', 'Api\DepartmentController@index');
    Route::post('/department/create', 'Api\DepartmentController@store');
    Route::put('/department/{id}', 'Api\DepartmentController@update');
    Route::delete('/department/{id}', 'Api\DepartmentController@destroy');

    //update done from vendo in timers
    Route::put('/timer/{label}/{id}', 'Api\TimerController@update');
    
});

//auth
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

//machines
Route::get('/machines', 'Api\MachineController@index');
Route::get('/{label}', 'Api\MachineController@show');

//timers
Route::get('/timer/{label}', 'Api\TimerController@index');
Route::post('/timers/fill/{label}', 'Api\TimerController@fillTimer');
