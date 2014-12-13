<?php

Route::when('admin/*', 'csrf', ['post', 'delete', 'put']);

Route::get('/', 'HomeController@index');
Route::get('/login', 'SessionController@create');
Route::get('/logout', 'SessionController@destroy');

// Admin

Route::group(['before'=>'auth'], function(){

Route::get('/admin', 'AdminController@index');
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/admin/user/{id}', 'UserController@adminshow');
Route::get('/admin/{id}/edit/user', 'UserController@edit');
Route::get('/admin/settings', 'AdminController@settings');
Route::get('/admin/course/add', 'CourseController@create');
Route::get('/admin/course', 'CourseController@admin');
Route::get('/admin/round/add', 'RoundController@getCourse');
Route::get('/admin/course/{id}/edit', 'CourseController@edit');
Route::get('/admin/holes/{id}/add', 'HoleController@create');
Route::get('/admin/holes/{id}/edit', 'HoleController@edit');
Route::post('/admin/round/add/score', array('uses' => 'RoundController@create'));

    }
);

// Course

Route::get('/course/{id}/show' , 'CourseController@show');
Route::get('/course' , 'CourseController@index');

// Rounds

Route::get('/rounds', 'RoundController@index');
Route::get('/rounds/{id}/user', 'RoundController@user_round');
Route::get('/round/{id}/course/{course_id}', 'RoundController@show');

// Hole

Route::get('/holes', 'HoleController@index');
Route::get('/hole/{id}/show', 'HoleController@show');

// Score

//Route::Post('/admin/{id}/score', ['as' => 'score.create', 'uses' => 'ScoreController@create']);

// Users
Route::get('/users', 'UserController@index');
Route::get('/user/{id}/show', 'UserController@show');
Route::get('/registration', 'RegistrationController@create');

Route::resource('session','SessionController', ['only'=>['create', 'store', 'destroy']]);
Route::resource('registration', 'RegistrationController', ['only'=>['store']]);
Route::resource('user','UserController');
Route::resource('course', 'CourseController');
Route::resource('hole', 'HoleController');
Route::resource('round', 'RoundController');
Route::resource('score', 'ScoreController');

