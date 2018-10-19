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
Route::resource('profile','ProfileController',['except'=>['destroy','show']]);
Route::resource('interns','InternController',['except'=>['show','destroy']]);
Route::resource('warmleads','WarmLeadsController',['only'=>['index']]);
Route::resource('sites','SitesController',['except'=>['show','destroy']]);
Route::resource('sites/get-region-list','SitesController@getRegionList',['only'=>['index']]);
Route::resource('sites/get-province-list','SitesController@getProvinceList',['only'=>['index']]);
Route::resource('sites/get-muncity-list','SitesController@getMuncityList',['only'=>['index']]);

//settings
Route::resource('settings','SettingsController',['only' => ['index']]);
Route::resource('school','SchoolController',['except' =>['create','show']]);
Route::resource('course','CourseController',['except' =>['create','show']]);
Route::resource('papers','PaperController', ['except' =>['create','show']]);
Route::resource('users','UserController',['only' =>['store','update','index']]);
Route::resource('userDesignation','UserDesignationController',['except' =>['create','show']]);
Route::resource('siteDesignation','siteDesignationController',['except' =>['create','show']]);
Route::resource('partnerDesignation','partnerDesignationController',['except' =>['create','show']]);
Route::resource('partnerOrganization','PartnerOrganizationtionController',['except' =>['create','show']]);


// Activation and Deactivation
Route::resource('partnerInactive','PartnerInactiveController',['only' =>['update']]);
Route::resource('profileInactive','ProfileInactiveController',['only' =>['update']]);
Route::resource('internInactive','InternInactiveController',['only' =>['update']]);
Route::resource('sitesInactive','SitesInactiveController',['only' =>['update']]);

Route::auth();

