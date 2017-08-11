<?php

/*
|--------------------------------------------------------------------------
| Web Group middleware
|--------------------------------------------------------------------------
|
| This middleware is defined in in your HTTP kernel & includes
| session state, cookies, CSRF protection, and more. By defaul,
| all public routes are included in this middleware.
|
|
*/
Route::get('/',                'StaticController@welcome');
Route::get('/about',           'StaticController@about');



/*
|--------------------------------------------------------------------------
| Auth Group middleware
|--------------------------------------------------------------------------
|
| This middleware is defined in in your HTTP kernel & includes
| session state, cookies, CSRF protection, and more. Protects
| all private authenticated routes.
|
|
*/
Route::group(['middleware' => ['auth']], function() {
  Route::get('/dashboard/{id}', 'UserDashController@index');
  Route::get('/home',           'HomeController@index');
  Route::post('/sorttitle',     'SortController@sortTitle');
});


/*
|--------------------------------------------------------------------------
| Resource Routes
|--------------------------------------------------------------------------
|
| The auth() function creates several of our Auth routes
| This middleware is defined in in your HTTP kernel & includes
| session state, cookies, CSRF protection, and more.
|
| The resource method allows us to list several routes with one
| from the controller passed with a single declaration.
| It names each route, and assigns the methods in the controller.
| To see a list of all routes run the command below, you may need to
| run it as sudo.
|
| php artisan route:list
|
*/
Route::auth();




Route::resource('/posts', 'BooksController',
  ['only' => ['store', 'show', 'edit', 'update', 'destroy']
]);
