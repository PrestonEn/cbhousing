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
Entrust::routeNeedsRole('admin*', 'admin', Redirect::to('/'));

/* static pages */

Route::get('/', 'PagesController@index');

Route::get('about', 'PagesController@about');

Route::get('loyalty', 'PagesController@loyalty');

Route::get('temp', 'PagesController@contact');

/* Auth controllers */

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/* Admin Controllers*/

Route::get('/admin', 'AdminController@index');

Route::get('/admin/requests', 'AdminController@requests');

// Route::post('/admin/requests/confirm/{id}');

// Route::post('/admin/requests/deny/{id}');

Route::get('/admin/landlords', 'AdminController@landlords');

Route::get('/admin/properties', 'AdminController@properties');

Route::get('/admin/properties/{id}', 'AdminController@show_property');

Route::post('/admin/addPropertyImg/{id}', 'AdminController@addPropertyImg');

Route::post('/admin/addPostingImg/{id}', 'AdminController@addPostingImg');

Route::get('/admin/updateLandlord/{id}', 'LandlordController@edit');



Route::get('/admin/postings', 'AdminController@postings');

Route::get('/admin/amenities', 'AdminController@amenities');


/* Landlord creations */

Route::get('landlords/create', 'LandlordController@create');

Route::post('landlords', 'LandlordController@store');

Route::patch('landlords/edit/{id}', 'LandlordController@update');

Route::post('landlords/destroy/{id}', 'LandlordController@destroy');


/* Property creations */

Route::post('properties', 'PropertyController@store');

Route::get('/admin/updateProperty/{id}', 'PropertyController@edit');

Route::patch('properties/edit/{id}', 'PropertyController@update');

Route::post('properties/destroy/{id}', 'PropertyController@destroy');



/* Posting creations */
Route::post('postings', 'PostingController@store');

Route::get('/admin/updatePosting/{id}', 'PostingController@edit');

Route::patch('postings/edit/{id}', 'PostingController@update');

Route::post('postings/destroy/{id}', 'PostingController@destroy');


/* amenities creations*/
Route::post('amenities', 'AmenitiesController@store');

Route::post('amenities/destroy/{id}', 'AmenitiesController@destroy');


Route::get('/admin/updateAmenity/{id}', 'AmenitiesController@edit');

Route::patch('amenities/edit/{id}', 'AmenitiesController@update');


/*properties page*/
Route::get('/properties','PropertyController@index');

/*single listing*/
Route::get('/properties/{id}', 'PropertyController@show');

/*user profile*/
Route::get('user/{id}', 'UserController@show');

/*Contact*/
Route::post('contactus', 'senderController@contactus');

/*present request form*/
Route::post('request/book', 'RequestController@store');

Route::post('request/approve/{id}', 'RequestController@approve');

Route::post('request/deny/{id}', 'RequestController@deny');

Route::post('request/destroy/{id}','RequestController@destroy');

Route::get('request/{id}', 'RequestController@create');







