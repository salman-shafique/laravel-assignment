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
Route::group(['middleware' => 'auth'], function() {
	Route::get('/questionairs',		  'QuestionaireController@index' );
	Route::get('questionairs/create', 'QuestionaireController@create');
	Route::post('questionairs/store', 'QuestionaireController@store');
	Route::post('questionairs/destroy', 'QuestionaireController@destroy');
	Route::post('questionairs/update', 'QuestionaireController@update');
	
	Route::get('/questionairs/crud/{id}', 'QuestionController@index');
	Route::post('/questions/crud', 'QuestionController@store');

});




Route::get('/', function () {
    return view('home/home');
});


Route::auth();

Route::get('/home', 'HomeController@index');
