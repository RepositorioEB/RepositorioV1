<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});*/
Route::group(['middleware' => 'web'], function () {

// -----Vista principal
      Route::get('/', function () {
        if(Auth::check()){
          return Redirect::to('member');
        }
        return view('welcome');
      });

// -----Autenticación
      Route::auth();

      Route::group(['prefix' => 'admin', 'middleware' => ['auth','AdminMw']],function(){
        // --------------> Home <------------ 
        Route::get('/', ['as' => 'admin.index', function () {
          return view('welcome');
        }]);

        Route::resource('profiles', 'ProfileController');
        Route::get('profiles/{id}/destroy', [
          'uses' => 'ProfileController@destroy',
          'as' => 'admin.profiles.destroy'
          ]);
        
        Route::resource('users', 'UserController');
        Route::get('users/{id}/destroy', [
          'uses' => 'UserController@destroy',
          'as' => 'admin.users.destroy'
          ]);
        
        Route::resource('categories', 'CategoryController');
        Route::get('categories/{id}/destroy', [
          'uses' => 'CategoryController@destroy',
          'as' => 'admin.categories.destroy'
          ]);
        
        Route::resource('downloads', 'DownloadController');
        Route::get('downloads/{id}/destroy', [
          'uses' => 'DownloadController@destroy',
          'as' => 'admin.downloads.destroy'
          ]);

        Route::resource('forums', 'ForumController');
        Route::get('forums/{id}/destroy', [
          'uses' => 'ForumController@destroy',
          'as' => 'admin.forums.destroy'
          ]); 

        Route::resource('helps', 'HelpController');
        Route::get('helps/{id}/destroy', [
          'uses' => 'HelpController@destroy',
          'as' => 'admin.helps.destroy'
          ]);  

        Route::resource('ovas', 'OvaController');
        Route::get('ovas/{id}/destroy', [
          'uses' => 'OvaController@destroy',
          'as' => 'admin.ovas.destroy'
          ]); 

        Route::resource('problems', 'ProblemController');
        Route::get('problems/{id}/destroy', [
          'uses' => 'ProblemController@destroy',
          'as' => 'admin.problems.destroy'
          ]);

        Route::resource('types', 'TypeController');
        Route::get('types/{id}/destroy', [
          'uses' => 'TypeController@destroy',
          'as' => 'admin.types.destroy'
          ]);

      });

      Route::group(['prefix' => 'member', 'middleware' => ['auth','MemberMw']],function(){
        Route::get('/', ['as' => 'member.index', function () {
          return view('home');
        }]);
        
      });
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
Route::group(['middleware' =>['web'], 'prefix'=> 'admin'], function(){

  Route::get('/', ['as' => 'admin.index', function () {
      return view('welcome');
  }]);

  Route::resource('profiles', 'ProfileController');
  Route::get('profiles/{id}/destroy', [
  	'uses' => 'ProfileController@destroy',
  	'as' => 'admin.profiles.destroy'
  	]);
  
  Route::resource('users', 'UserController');
  Route::get('users/{id}/destroy', [
    'uses' => 'UserController@destroy',
    'as' => 'admin.users.destroy'
    ]);
  
  Route::resource('categories', 'CategoryController');
  Route::get('categories/{id}/destroy', [
    'uses' => 'CategoryController@destroy',
    'as' => 'admin.categories.destroy'
    ]);
  
  Route::resource('downloads', 'DownloadController');
  Route::get('downloads/{id}/destroy', [
    'uses' => 'DownloadController@destroy',
    'as' => 'admin.downloads.destroy'
    ]);

  Route::resource('forums', 'ForumController');
  Route::get('forums/{id}/destroy', [
    'uses' => 'ForumController@destroy',
    'as' => 'admin.forums.destroy'
    ]); 

  Route::resource('helps', 'HelpController');
  Route::get('helps/{id}/destroy', [
    'uses' => 'HelpController@destroy',
    'as' => 'admin.helps.destroy'
    ]);  

  Route::resource('ovas', 'OvaController');
  Route::get('ovas/{id}/destroy', [
    'uses' => 'OvaController@destroy',
    'as' => 'admin.ovas.destroy'
    ]); 

  Route::resource('problems', 'ProblemController');
  Route::get('problems/{id}/destroy', [
    'uses' => 'ProblemController@destroy',
    'as' => 'admin.problems.destroy'
    ]);

  Route::resource('types', 'TypeController');
  Route::get('types/{id}/destroy', [
    'uses' => 'TypeController@destroy',
    'as' => 'admin.types.destroy'
    ]);
});
*/