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

        #   Club        #
        Route::get('/admin/club/add', 'ClubController@create');
        Route::get('/admin/club/{id}/edit', 'ClubController@edit');
        Route::get('/admin/clubs', 'AdminController@clubs');
    }
);

Route::group(['before'=>'auth'], function(){

    #   Dashboard   #
    Route::get('/dashboard', 'HomeController@dashboard');

    #   Round       #
    Route::get('/round/add', 'RoundController@getCourse');
    Route::get('/rounds/{id}/user', 'RoundController@user_round');
    Route::post('/round/add/{id}/score', array('as'=>'round-add-score','uses' => 'RoundController@create'));
    Route::get('/round/{id}/course/{course_id}/score/add', 'ScoreController@create');
    Route::get('/round/{id}/edit/{course_id}', 'RoundController@edit');

    #   Score       #
    Route::get('/score/{id}/edit', 'ScoreController@edit');

    #   User        #
    Route::get('/edit/{id}/user', 'UserController@edit');

    #   Shots       #
    Route::get('/shots/{round_id}/add/{id}', 'ShotController@create');
    Route::get('/shots/{round_id}/edit/{hole_id}', 'ShotController@edit');

    #   Bag         #
    Route::get('/bag/add', 'BagController@create');
    Route::get('/bag/{id}/edit', 'BagController@edit');
    Route::get('/user/{id}/bags', 'BagController@user');

    #   Disc        #
    Route::get('/disc/add', 'DiscController@create');
    Route::get('/disc/{id}/edit', 'DiscController@edit');
    Route::get('/user/{id}/discs', 'DiscController@user');

});


// Course
Route::get('/course/{id}/show' , 'CourseController@show');
Route::get('/course' , 'CourseController@index');

#   Clubs
Route::get('/clubs', 'ClubController@index');
Route::get('/club/{id}/edit', 'ClubController@edit');
Route::get('/club/{id}/show', 'ClubController@show');

// Rounds
Route::get('/rounds', 'RoundController@index');
Route::get('/round/{id}/course/{course_id}', 'RoundController@show');

// Hole
Route::get('/holes', 'HoleController@index');
Route::get('/hole/{id}/show', 'HoleController@show');

// Shot
Route::get('/hole/{id}/score/{score_id}', 'ShotController@show');

// Bag
Route::get('/bags', 'BagController@index');
Route::get('/bags/{id}/show', 'BagController@show');

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
Route::resource('club', 'ClubController');
Route::resource('shot', 'ShotController');
Route::resource('bag', 'BagController');
Route::resource('disc', 'DiscController');

# Permissions and Roles

Route::get('/test', function(){
    $config = array();
    $config['center'] = 'auto';
    $config['onboundschanged'] = 'if (!centreGot) {

            marker_0.setOptions({
                position: new google.maps.LatLng(37.4419, 13.392947)
            });
        }
        centreGot = true;';

    Gmaps::initialize($config);

    // set up the marker ready for positioning
    // once we know the users location
    $marker = array();
    Gmaps::add_marker($marker);

    $map = Gmaps::create_map();
    echo "<html><head>".$map['js']."</head><body>".$map['html']."</body></html>";
});

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