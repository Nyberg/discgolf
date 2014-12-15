<?php

Route::when('admin/*', 'csrf', ['post', 'delete', 'put']);

Route::get('/', 'HomeController@index');
Route::get('/login', 'SessionController@create');
Route::get('/logout', 'SessionController@destroy');

// Admin



Route::group(['before'=>'checkAdmin'], function(){

        #   Dashboard   #
        Route::get('/admin','AdminController@index');

        #   User        #
        Route::get('/admin/user/{id}', 'UserController@adminshow');
        Route::get('/admin/users', 'AdminController@users');

        #   Settings    #
        Route::get('/admin/settings', 'AdminController@settings');

        #   Course      #
        Route::get('/admin/course/add', 'CourseController@create');
        Route::get('/admin/course', 'CourseController@admin');
        Route::get('/admin/course/{id}/edit', 'CourseController@edit');

        #   Hole        #
        Route::get('/admin/holes/{id}/add', 'HoleController@create');
        Route::get('/admin/holes/{id}/edit', 'HoleController@edit');
    }
);

Route::group(['before'=>'auth'], function(){

    Route::get('/dashboard', 'AdminController@index');

    #   Round   #
    Route::get('/round/add', 'RoundController@getCourse');
    Route::get('/rounds/{id}/user', 'RoundController@user_round');
    Route::post('/round/add/score', array('uses' => 'RoundController@create'));

    #   Score   #
    Route::get('/score/{id}/edit', 'ScoreController@edit');

    #   User    #
    Route::get('/{id}/edit/user', 'UserController@edit');

});


// Course
Route::get('/course/{id}/show' , 'CourseController@show');
Route::get('/course' , 'CourseController@index');

// Rounds
Route::get('/rounds', 'RoundController@index');
Route::get('/round/{id}/course/{course_id}', 'RoundController@show');

// Hole
Route::get('/holes', 'HoleController@index');
Route::get('/hole/{id}/show', 'HoleController@show');

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

# Permissions and Roles


Route::get('/create-role', function(){

    $user = new Role;
    $user->name = 'User';
    $user->save();

    $admin = new Role;
    $admin->name = 'Admin';
    $admin->save();

    Auth::user()->roles()->attach(7);

    return 'Roller satta!';

});