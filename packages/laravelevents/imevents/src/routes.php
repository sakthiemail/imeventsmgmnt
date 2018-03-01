<?php
/**
 * Created by PhpStorm.
 * User: Sakthi
 * Date: 2/28/2018
 * Time: 8:13 PM
 */

Auth::routes();
Route::get('imevent',['middleware' => 'web','uses'=>'ImEventsController@index']);
Route::get('imevent/add',['middleware' => 'web','uses'=>'ImEventsController@create']);
Route::post('imevent/store',['middleware' => 'web','uses'=>'ImEventsController@store']);
