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

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('partner','PartnerController',['except'=>['destroy','show']]);
Route::resource('profile','UserController',['except'=>['destroy','show']]);
Route::resource('interns','InternController');
Route::resource('warmleads','WarmLeadsController',['only'=>['index']]);
Route::resource('sites','SitesController');
Route::resource('summary','SummaryController',['only'=>['index']]);
Route::resource('others','OthersController',['only' => ['index']]);
Route::resource('school','SchoolController',['only' =>['store','update']]);
Route::resource('course','CourseController',['only' =>['store','update']]);
Route::resource('papers','PaperController',['only' =>['store','update']]);
Route::auth();
//Route::get('/home', 'HomeController@index');