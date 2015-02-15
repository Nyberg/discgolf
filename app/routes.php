<?php

Route::when('admin/*', 'csrf', ['post', 'delete', 'put']);

Route::get('/', 'HomeController@index');
Route::get('/login', 'SessionController@create');
Route::get('/logout', 'SessionController@destroy');

// Admin

Route::group(['before'=>'checkAdmin'], function(){

        #   Forum       #
        Route::group(['prefix' => '/forum'], function(){
            Route::group(['before' => 'csrf'], function(){
                Route::post('/category/add', ['as' => 'forum-store-category', 'uses' => 'ForumsController@storeCategory']);
                Route::post('/category/edit/{id}', ['as' => 'categoryUpdate', 'uses' => 'ForumsController@updateCategory']);
                Route::post('/group', ['as' => 'forum-store-group', 'uses' => 'ForumsController@storeGroup']);
                Route::post('/thread/{id}/lock', ['as' => 'forum-lock-thread', 'uses' => 'ForumsController@lockThread']);
            });
            Route::group(['before' => 'checkRole'], function(){
                Route::post('/group/delete', ['as'=> 'forum-delete-group', 'uses' => 'ForumsController@deleteGroup']);
            });
        });

        #   Dashboard   #
        Route::get('/admin','AdminController@index');

        #   User        #
        Route::get('/admin/user/{id}', 'UserController@adminshow');
        Route::get('/admin/users', 'AdminController@users');

        #   Roles       #
        Route::group(['before'=>'csrf'], function() {
            Route::post('/user/change-roles/', array(
                'as' => 'change-roles',
                'uses' => 'UserController@addRoles'
            ));

        });

        Route::get('/admin/user/{id}/roles/edit', 'UserController@addRole');

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
        Route::get('/admin/clubs', 'AdminController@clubs');
        Route::get('/admin/club/owners', 'AdminController@clubOwners');


        #   Land, Landskap & Stad   #
        Route::get('/admin/location/', 'CountryController@index');
    }
);

Route::group(['before'=>'checkClubOwner'], function(){

        #   Course      #
        Route::get('/admin/course/add', 'CourseController@create');
        Route::get('/admin/course/{id}/edit', 'CourseController@edit');

        #   Tee         #
        Route::get('/admin/tee/{id}/add', 'TeeController@create');
        Route::get('/admin/tee/{id}/edit', 'TeeController@edit');

        # News          #
        Route::get('/admin/add/news', 'NewsController@create');
        Route::get('/admin/news/{id}/edit', 'NewsController@edit');

        #   Club        #
        Route::get('/admin/club/{id}/edit', 'ClubController@edit');
        Route::get('/admin/club/{id}/courses', 'ClubController@clubCourses');
        Route::get('/admin/club/{id}/users', 'ClubController@clubUsers');

        #   Hole        #
        Route::get('/admin/holes/{course_id}/tee/{id}/add', 'HoleController@create');
        Route::get('/admin/holes/{id}/edit', 'HoleController@edit');

        #   Membership  #
        Route::get('/admin/accept/{user_id}/club/{club_id}/', 'MembershipController@accept');
        Route::get('/admin/deny/{user_id}/club/', 'MembershipController@deny');
}
);

Route::group(['before'=>'auth'], function(){

    #   Dashboard   #
    Route::get('/dashboard', 'HomeController@dashboard');

    #   Round       #
    Route::get('/account/round/add', 'RoundController@getCourse');
    Route::get('/account/rounds/{id}/user', 'RoundController@user_round');
    Route::post('/account/round/add/{id}/score', array('as'=>'account-round-add-score','uses' => 'RoundController@create'));
    Route::get('/account/round/{id}/course/{course_id}/score/add', 'ScoreController@create');
    Route::get('/account/round/{id}/course/{course_id}/par/', 'RoundController@createPar');
    Route::get('/account/round/{id}/edit/{course_id}', 'RoundController@edit');
    Route::get('/account/round/{id}/active', 'RoundController@setActive');
    Route::get('/account/round/{id}/edit-score', 'RoundController@editScore');

    Route::post('/getTees', 'TeeController@getTeepads');
    Route::post('/getHoles', 'HoleController@getHoles');
    Route::get('/getUsers', 'UserController@getPlayers');
    Route::post('/getScore', 'ScoreController@getScore');

    #   Score       #
    Route::get('/account/score/{id}/edit', 'ScoreController@edit');

    #   Lost & Found    #
    Route::get('/account/lost/add', 'LostController@create');
    Route::get('/account/user/{id}/lost-and-found', 'LostController@user');
    Route::get('/account/lost-and-found/{id}/solved', 'LostController@markSolved');

    #   User        #
    Route::get('/account/edit/{id}/user', 'UserController@edit');

    Route::group(['before'=>'csrf'], function(){

        Route::post('/account/user/change-password/', array(
            'as' => 'account-change-password',
            'uses' => 'UserController@changePassword'
        ));

    });

    Route::get('/account/user/password/', 'UserController@password');

    #   Shots       #
    Route::get('/account/shots/{round_id}/add/{id}', 'ShotController@create');
    Route::get('/account/shots/{round_id}/edit/{hole_id}', 'ShotController@edit');

    #   Bag         #
    Route::get('/account/bag/add', 'BagController@create');
    Route::get('/account/bag/{id}/edit', 'BagController@edit');
    Route::get('/account/user/{id}/bags', 'BagController@user');

    #   Disc        #
    Route::get('/account/disc/add', 'DiscController@create');
    Route::get('/account/disc/{id}/edit', 'DiscController@edit');
    Route::get('/account/user/{id}/discs', 'DiscController@user');

    #   Comments    #
    Route::get('/comments/course/', 'CommentController@course_store');
    Route::get('/account/comment/user', 'CommentController@index');

    #   Sponsors    #
    Route::get('/account/sponsor/add', 'SponsorController@create');
    Route::get('/account/sponsor/{id}/edit/', 'SponsorController@edit');
    Route::get('/account/sponsor/user/', 'SponsorController@show');

    #   Reviews     #
    Route::get('/account/review/add', 'ReviewController@create');
    Route::get('/account/review/{id}/edit', 'ReviewController@edit');
    Route::get('/account/review/user', 'ReviewController@show');

    # Request       #
    Route::post('/account/request/{id}/club', ['as'=>'club-request', 'uses'=> 'MembershipController@store']);

    #   Forum       #
    Route::group(['prefix' => '/forum'], function(){
        Route::get('/new/thread/{id}', ['as' => 'newThread', 'uses' => 'ForumsController@newThread']);
        Route::get('/thread/edit/{id}', ['as' => 'thread.edit', 'uses' => 'ForumsController@editThread']);
        Route::get('/thread/{id}/delete', ['as' => 'forum-delete-comment', 'uses' => 'ForumsController@deleteThread']);
        Route::get('/comment/{id}/delete', ['as' => 'forum-delete-comment', 'uses' => 'ForumsController@deleteComment']);
        Route::get('/comment/{id}/edit', 'ForumsController@editComment');


        Route::group(['before' => 'csrf'], function(){
            Route::post('/group/club', ['as' => 'forum-store-club-group', 'uses' => 'ForumsController@storeClubGroup']);
            Route::post('/new/thread/save/{id}', ['as' => 'newThread.store', 'uses' => 'ForumsController@newThreadStore']);
            Route::post('/thread/update/{id}', ['as' => 'threadUpdate', 'uses' => 'ForumsController@updateThread']);
            Route::post('/thread/new/comment/{id}', ['as' => 'forum-store-comment', 'uses' => 'ForumsController@storeComment']);
            Route::post('/comment/{id}/update', ['as'=>'forum-update-comment', 'uses'=>'ForumsController@updateComment']);
        });

    });

});

#   Forum       #
Route::group(['prefix' => '/forum'], function(){
    Route::get('/', 'ForumsController@index');
    Route::get('/category/{id}', ['as' => 'forum-group', 'uses' => 'ForumsController@category']);
    Route::get('/thread/{id}', ['as' => 'forum-thread', 'uses' => 'ForumsController@thread']);
});

#   Sök     #
Route::get('/query', 'SearchController@query');
Route::get('/searchresult', ['as' => 'searchresult', 'uses' => 'SearchController@searchResult']);
Route::get('/search/{result}','SearchController@search');

#   Hämta medspelare     #
Route::get('/getplayer', 'SearchController@getplayer');
Route::get('/searchplayer', ['as' => 'searchplayer', 'uses' => 'SearchController@searchPlayer']);


Route::get('/search/{result}','SearchController@search');

#   App     #
Route::get('/app', 'RoundController@app');

#   Sidor   #
Route::get('/about-discgol/', 'HomeController@discgolf');
Route::get('/rules-discgolf/', 'HomeController@rules');
Route::get('/about/', 'HomeController@about');
Route::get('/links/', 'HomeController@links');

// Course
Route::get('/course/{id}/show' , 'CourseController@show');
Route::get('/courses' , 'CourseController@index');

#   Clubs
Route::get('/clubs', 'ClubController@index');
Route::get('/club/{id}/edit', 'ClubController@edit');
Route::get('/club/{id}/show', 'ClubController@show');

# Lost & Found  #
Route::get('/lost-and-found', 'LostController@index');

#   News    #

Route::get('/club/news/{id}/show', 'NewsController@show');

// Rounds
Route::get('/rounds', 'RoundController@index');
Route::get('/round/{id}/course/{course_id}', 'RoundController@show');
Route::get('/round/{id}/user/show', 'UserController@userRound');
Route::get('/course/{id}/rounds/', 'RoundController@courseRound');
Route::get('/records', 'RoundController@records');

// Hole
Route::get('/holes', 'HoleController@index');
Route::get('/hole/{id}/show', 'HoleController@show');
Route::post('/stats/hole/', ['as' => 'hole.stats', 'uses' => 'HoleController@getStats']);
Route::get('/getHoleStats', 'HoleController@getHoleStats');
Route::get('/getRoundsPerMonth', 'HoleController@getRoundsPerMonth');
Route::get('/getRoundAvgScore', 'HoleController@getRoundAvgScore');
Route::post('/getRoundAvg', ['as' => 'course.stats', 'uses'=>'HoleController@getRoundAvg']);

// Shot
Route::get('/hole/{id}/score/{score_id}', 'ShotController@show');

// Bag
Route::get('/bags', 'BagController@index');
Route::get('/bags/{id}/show', 'BagController@show');

// Users
Route::get('/users', 'UserController@index');
Route::get('/user/{id}/show', 'UserController@show');
Route::get('/registration', 'RegistrationController@create');

#   Password    #
Route::controller('password', 'RemindersController');

#   Sponsors    #
Route::get('/sponsor/{id}/redirect/', 'SponsorController@redirect');



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
Route::resource('comment', 'CommentController');
Route::resource('news', 'NewsController');
Route::resource('sponsor', 'SponsorController');
Route::resource('role', 'RoleController');
Route::resource('review', 'ReviewController');
Route::resource('tee', 'TeeController');
Route::resource('forum', 'ForumsController');
Route::resource('request', 'RequestController');
Route::resource('country', 'CountryController');
Route::resource('lost', 'LostController');