<?php
// Route::get('/',function(){
//     return 'THIS IS THE HOMEPAGE !';
// });
Route::group(['prefix' => 'admin'],function(){
	Route::get('login','Admin\LoginController@showLoginForm');
	Route::post('login','Admin\LoginController@login');

});


/**
 * Administration section
 */
Route::group(['prefix' => 'admin','middleware' => 'auth:employee'], function(){
    Route::get('logout','Admin\LoginController@logout')->name('admin.logout');
	Route::get('/','DashboardController@index')->name('admin.home');
	Route::get('categories','CategoriesController@index')->name('admin.categories.index');
	Route::post('categories','CategoriesController@store')->name('admin.categories.post');
	Route::post('categories/{category}/delete','CategoriesController@delete')->name('admin.categories.delete');
	Route::get('categories/{category}/edit','CategoriesController@edit')->name('admin.categories.edit');
	Route::post('categories/{category}/edit','CategoriesController@update')->name('admin.categories.update');

	Route::get('shops','ShopsController@index')->name('admin.shops.index');
	Route::post('shops','ShopsController@store')->name('admin.shops.post');
	Route::post('shops/{shop}/edit','ShopsController@update')->name('admin.shops.update');
	Route::get('shops/{shop}','ShopsController@show')->name('admin.shops.show');
	Route::delete('shops/{shop}','ShopsController@destroy')->name('admin.shops.delete');

	Route::post('shops/{shop}/addresses','AddressesController@store')->name('admin.shops.addresses');

	Route::get('locations/all','LocationsController@index')->name('admin.locations.all');

	Route::get('items','ItemsController@index')->name('admin.items.index');
	Route::post('items','ItemsController@store')->name('admin.items.store');
	Route::get('items/create','ItemsController@create')->name('admin.items.create');
	Route::get('items/{item}/edit','ItemsController@edit')->name('admin.items.edit');
	Route::post('items/{item}/update','ItemsController@update')->name('admin.items.update');
	Route::post('items/{item}/delete','ItemsController@delete')->name('admin.items.delete');
	//Route::get('categories/{category}/articles','ArticlesController@list')->name('admin.categories.articles');

    // Shops
    // Route::get('shops/create','ShopsController@create')->name('admin.shops.create');
    // Route::get('shops/','ShopsController@index')->name('admin.shops.index');
    // Route::get('shops/{id}/edit','ShopsController@edit')->name('admin.shops.edit');
    // Route::put('shops/{id}/edit','ShopsController@update')->name('admin.shops.update');
    // Route::post('shops/create','ShopsController@store')->name('admin.shops.store');
});
