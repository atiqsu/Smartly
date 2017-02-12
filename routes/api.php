<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authentication routes
Route::post('register','Api\AuthController@register');
Route::post('login','Api\AuthController@login');

// CRUD Routes
Route::group(['middleware' => 'auth:api'],function(){
	Route::get('category/{category}','Api\CategoriesController@show');
	Route::get('categories','Api\CategoriesController@index');
    Route::post('item/{item}/comment','Api\CommentsController@store');
	//Route::get('items/{item}','Api\ItemsController@show');
	// TODO: Get instead of post --> More restufl
	Route::get('items', 'Api\ItemsController@index');
	Route::get('items/last','Api\ItemsController@last');
    Route::post('items','Api\ItemsController@store');
//	Route::post('items/','Api\ItemsController@store');
	Route::post('vote/{item}','Api\VotesController@store');

//	Route::post('items/{item}/comment','Api\CommentsController@store');

	Route::get('user/{user}','Api\UsersController@show');
	Route::get('user','Api\UsersController@index');
	Route::post('user/{user}','Api\UsersController@update');
	Route::post('coordinates','Api\CoordinatesController@check');
    Route::post('shops/{shop}/exists','Api\ItemsController@exists');
    Route::get('shops','Api\ShopsController@index');

    Route::get('categories','Api\CategoriesController@index');

});
