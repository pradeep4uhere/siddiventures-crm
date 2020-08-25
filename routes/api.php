<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1/'], function (){
	//All Seller APIs
	Route::any('gethomepage','Api\HomeController@gethomepage')->name('gethomepage');
	Route::any('getpagedetails/{pageid}','Api\HomeController@getPageDetails')->name('getpagedetails');
	Route::any('joinus','Api\HomeController@getJoinnUs')->name('joinus');
	Route::any('jobdetails/{pageid}','Api\HomeController@jobDetails')->name('jobdetails');
	
	Route::any('applyjob','Api\HomeController@applyjob')->name('applyjob');
	Route::post('applycontactus','Api\HomeController@applycontactus')->name('applycontactus');
	Route::any('replyonapplication','Api\HomeController@replyOnApplicationByCandidate')->name('replyonapplication');
	Route::any('isvalidapplication/{id}','Api\HomeController@isValidApplication')->name('isvalidapplication');
});