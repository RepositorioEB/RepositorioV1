<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});*/

        
Route::group(['middleware' => 'web'], function () {

    // -----Autenticación
      Route::auth();

      Route::get('/', function () {
        if(Auth::check()){
          return Redirect::to('member');
        }
        return view('welcome');
      });
            
      Route::group(['middleware' => ['auth']],function(){

          // -----Vista principal
        Route::get('rovaa',function(){
          if(Auth::check()){
            return view('rovaa');
          }
            return Redirect::to('member');
        });
        Route::get('acercade',function(){
          if(Auth::check()){
            return view('acercade.creadores');
          }
            return Redirect::to('member');
        });
        Route::get('problematica',function(){
          if(Auth::check()){
            return view('acercade.problematica');
          }
            return Redirect::to('member');
        });

        Route::group(['prefix' => 'chat'],function(){
        
          //Routes chat
          Route::resource('users_chats', 'User_ChatController');
          Route::get('llamando', [
            'as' => 'chat.users_chats.conversation', 
            'uses' => 'User_ChatController@conversation'
          ]);
          Route::get('escribir', [
            'as' => 'chat.users_chats.escribir', 
            'uses' => 'User_ChatController@escribir'
          ]);
          Route::get('mensajes', [
            'as' => 'chat.users_chats.conversationchat', 
            'uses' => 'User_ChatController@conversationchat'
          ]);
        
          //End routes chat
        });

        Route::group(['prefix' => 'foro'],function(){
        
          //Routes Foro
          Route::resource('foros_usuarios', 'Forum_UserController');
          Route::get('/comentar', [
            'as' => 'foro.foros_usuarios.message', 
            'uses' => 'Forum_UserController@message'
            ]);
          //End routes foro
          Route::get('recentarchive',[
            'uses' => 'ForumRecentArchiveController@index',
            'as'   => 'foro.forums.recentarchive'
            ]);
          Route::get('own',[
            'uses' => 'ForumController@own',
            'as'   => 'foro.own.index'
            ]);
          
            
        });
        Route::group(['prefix' => 'cuenta'],function(){
        
          //Routes cuenta
          Route::resource('user', 'AccountController');
          Route::get('user/{id}/password',[
            'uses' => 'AccountController@password',
            'as'   => 'cuenta.user.password'
            ]);
          Route::put('configuracion',
          ['as' => 'cuenta.user.updates',
          'uses' => 'AccountController@update2'
          ]);
          //End routes cuenta
        });

        Route::group(['prefix' => 'ovas'],function(){
        
          Route::get('ova/{slug}',
          ['as' => 'ovas.ova.slug', 
          'uses' => 'OvaEvaluationController@slug']
          );
          Route::resource('ova', 'OvaEvaluationController');
          Route::resource('ovamember', 'OvaMemberController');
          Route::resource('type', 'OvaTypeController');
          Route::resource('category', 'OvaCategoryController');
          Route::get('alls',
          ['as' => 'ovas.alls', 
          'uses' => 'OvaController@ovas']
          );
          Route::get('menu',
          ['as' => 'ovas.menu', 
          'uses' => 'OvaMemberController@menu']
          );
          Route::resource('ovamember', 'OvaMemberController');
          Route::resource('downloads', 'DownloadMemberController');
          Route::resource('recentarchive', 'RecentArchiveController');
          Route::resource('ova_comment', 'OvaCommentController');

          Route::get('own',[
            'uses' => 'OvaEvaluationController@own',
            'as'   => 'ovas.own.index'
          ]);

        });
        Route::group(['prefix' => 'search'],function(){
          Route::resource('mainsearch', 'MainSearchController');
        });


          // --------------> Routes Admin <------------ 
        Route::group(['prefix' => 'admin', 'middleware' => ['AdminMw']],function(){
        // --------------> Home <------------ 
          Route::get('/', ['as' => 'admin.index', function () {
            return view('home');
          }]);

          // --------------> CRUD Perfiles <------------ 
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
        Route::group(['prefix' => 'helps'],function(){
            Route::get('list',[
            'uses' => 'HelpController@listas',
            'as'   => 'helps.list'
            ]);
            Route::get('recentarchive',[
            'uses' => 'HelpRecentArchiveController@index',
            'as'   => 'helps.recentarchive'
            ]);
            Route::get('own',[
            'uses' => 'HelpController@own',
            'as'   => 'helps.own.index'
            ]);
            Route::get('show/{helps}', [
            'as' => 'helps.show',
            'uses' => 'HelpController@show'
            ]);
        });

        
        // --------------> Routes Member <------------ 
        Route::group(['prefix' => 'member', 'middleware' => ['MemberMw']],function(){
            Route::get('/', ['as' => 'member.index', function () 
            {
              return view('home');
            }]);
            
            Route::resource('profiles', 'ProfileController');
            Route::get('profiles', [
              'as' => 'member.profiles.lists', 
              'uses' => 'ProfileController@lists'
            ]);

            Route::resource('forums', 'ForumController');
             Route::resource('problems', 'ProblemController');
            Route::get('problems/{id}/destroy', [
            'uses' => 'ProblemController@destroy',
            'as' => 'member.problems.destroy'
            ]);
            /*Route::get('helps',[
            'uses' => 'HelpController@listas',
            'as'   => 'member.helps'
            ]);
            Route::get('recentarchive',[
            'uses' => 'HelpRecentArchiveController@index',
            'as'   => 'member.helps.recentarchive'
            ]);
            Route::get('helps/{helps}', [
            'as' => 'member.helps.show',
            'uses' => 'HelpController@show'
            ]);*/

        });

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

        //Routes chat
          Route::resource('users_chats', 'User_ChatController');
          Route::get('contactos',function()
          {
            $users = DB::table('users')->paginate(30);
            return view('member.users_chats.consulta')->with('users', $users);
          });
          Route::get('llamando',function()
          {
            $users_chats = DB::table('users_chats')->orderBy('created_at','DESC')->paginate(1000);
            $users = DB::table('users')->paginate(30);
            return view('member.users_chats.conversation')->with('users', $users)->with('users_chats', $users_chats);
          });
          //End routes chat
          
          //Routes Foro
          Route::resource('foros', 'ForumController');
          Route::resource('foros_usuarios', 'Forum_UserController');

          Route::get('foros-lista',function()
          {
            $forums = DB::table('forums')->paginate(30);
            $users = DB::table('users')->paginate(30);
            return view('member.forums_users.list')->with('forums', $forums)->with("users",$users);
          });
          //End routes chat

});*/