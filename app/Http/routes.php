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
Route::resource('profile','ProfileController',['except'=>['destroy']]);
Route::resource('interns','InternController',['except'=>['show','destroy']]);
Route::resource('warmleads','WarmLeadsController',['only'=>['index']]);
Route::resource('sites','SitesController',['except'=>['show','destroy']]);

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

// // Facility Config
Route::resource('facility','FacilityConfigController',['except'=>['show','destroy']]);
Route::resource('facility/get-region-list','FacilityConfigController@getRegionList',['only'=>['index']]);
Route::resource('facility/get-province-list','FacilityConfigController@getProvinceList',['only'=>['index']]);
Route::resource('facility/get-muncity-list','FacilityConfigController@getMuncityList',['only'=>['index']]);
Route::resource('facility/get-brgy-list','FacilityConfigController@getBrgyList',['only'=>['index']]);


// Activation and Deactivation
Route::resource('partnerInactive','PartnerInactiveController',['only' =>['update']]);
Route::resource('profileInactive','ProfileInactiveController',['only' =>['update']]);
Route::resource('internInactive','InternInactiveController',['only' =>['update']]);
Route::resource('sitesInactive','SitesInactiveController',['only' =>['update']]);

Route::auth();

