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

Route::get('/', ['as' => 'home', 'uses' => 'ShipsController@index']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('about', ['as' => 'about','uses' =>'PagesController@about']);
Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::get('item', ['as' => 'item', 'uses' => 'PagesController@item']);

Route::resource('ships', 'ShipsController');
Route::get('ships/{ship}/purchase', ['as' => 'ships.purchase', 'uses' => 'ShipsController@purchace']);
Route::post('ships/favorite', ['as' => 'ships.favorite', 'uses' => 'ShipsController@favorite']);
Route::patch('ships/{ship}/purchase', ['as' => 'ships.purchased', 'uses' => 'ShipsController@purchased']);

Route::get('bridges', ['as' => 'bridges.index', 'uses' => 'BridgesController@index']);
Route::get('bridges/{bridge}', ['as' => 'bridges.show', 'uses' => 'BridgesController@show']);
Route::get('bridges/{opening}/delete', ['as' => 'bridges.delete', 'uses' => 'BridgesController@delete']);

Route::resource('openings', 'OpeningsController');
Route::get('openings/showtype/{type}/{id}', ['as' => 'openings.showtype', 'uses' => 'OpeningsController@showtype']);
Route::get('openings/delete/{type}/{id}', ['as' => 'openings.delete', 'uses' => 'OpeningsController@delete']);
