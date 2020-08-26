<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('login');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

//Menu Routing Start
Route::any('allmenu','MenuController@allMenuList')->name('allmenu');
Route::any('allmenumanage','MenuController@allMenuListManage')->name('allmenumanage');
Route::any('menutype/{id}','MenuController@allMenuTypeListManage')->name('menutype');
Route::any('addmenu','MenuController@addMenu')->name('addmenu');
Route::any('addchildmenu/{id}','MenuController@addmenu')->name('addchildmenu');
Route::any('editmenu/{id}','MenuController@editMenu')->name('editmenu');
Route::any('deletemenu/{id}','MenuController@deleteMenu')->name('deletemenu');
Route::get('getsubmenu/{id}','PageController@getSubMenu')->name('getsubmenu');
Route::get('getsubmenuedit/{id}/{selected}','PageController@getSubMenuEdit')->name('getsubmenuedit');


//DS and RO Route
Route::any('alldslist'		,'UserController@allDSList')->name('alldslist');
Route::any('allrolist'		,'UserController@allROList')->name('allrolist');
Route::any('editds/{id}'	,'UserController@editDistributor')->name('editds');
Route::any('editro/{id}'	,'UserController@editRetailer')->name('editro');

//All Payment Balance Request
Route::any('alldsbalancerequest','DsWalletBalanceRequestController@allDSBalanceRequest')->name('alldsbalancerequest');
Route::any('allrobalancerequest','DsWalletBalanceRequestController@allROBalanceRequest')->name('allrobalancerequest');


//JOB Skills Routes goees here
Route::any('alljobskills','JobController@allJobSkillList')->name('alljobskills');
Route::any('addskill','JobController@addSkill')->name('addskill');
Route::any('editskill/{id}','JobController@editSkill')->name('editskill');
Route::any('deleteskill/{id}','JobController@deleteSkill')->name('deleteskill');


Route::any('contactuslist'		,'JobController@allContactusList')->name('contactuslist');
Route::any('deletemessage/{id}','JobController@deleteMessage')->name('deletemessage');
Route::any('replymessage/{id}','JobController@replyMessage')->name('replymessage');
Route::any('replymessageonemail','JobController@replyMessageOnEmail')->name('replymessageonemail');
Route::any('replyforapplication','JobController@replyMessageOnEmail')->name('replyforapplication');

//all Job Related
Route::any('alljobsapplication'		,'JobController@allJobApplication')->name('alljobsapplication');
Route::any('editapplication/{id}','JobController@editApplication')->name('editapplication');
Route::any('viewapplication/{id}','JobController@viewApplication')->name('viewapplication');
Route::any('replyonapplication/{id}','JobController@replyOnApplicationByCandidate')->name('replyonapplication');
Route::any('replymessageonapplication/{id}','JobController@replyMessageOnApplication')->name('replymessageonapplication');




Route::any('createjob'		,'JobController@createJob')->name('createjob');
Route::any('editjob/{id}'	,'JobController@editJob')->name('editjob');
Route::any('viewjob/{id}'	,'JobController@viewJob')->name('viewjob');
Route::any('viewjob/{id}/application'	,'JobController@viewJob')->name('viewjob');
Route::any('deletejob/{id}'	,'JobController@deletejob')->name('deletejob');
Route::any('deleteJobImage/{id}','JobController@deleteJobImage')->name('deleteJobImage');
Route::any('downloadcv/{id}'	,'JobController@downloadJobApplicationsCvs')->name('downloadcv');





Route::any('addcontent/{id}','PageController@addPageContent')->name('addcontent');
Route::any('contentlist/{id}','PageController@pageContentList')->name('contentlist');

Route::any('deletepagecontent/{id}','PageController@deletePageContent')->name('deletepagecontent');
Route::any('deletecontentimage/{id}','PageController@deletePageContentImage')->name('deletecontentimage');
Route::any('editcontent/{id}','PageController@editPageContent')->name('editcontent');
Route::any('allpages','PageController@allPageList')->name('allpages');
Route::get('createpage','PageController@createPage')->name('createpage');
Route::post('createpage','PageController@createPage')->name('createpage');
Route::any('editpage/{id}','PageController@editpage')->name('editpage');
Route::any('deletepage/{id}','PageController@deletepage')->name('deletepage');
Route::any('uploadpdf','PageController@uploadpdf')->name('uploadpdf');
Route::any('saveuploadpdf','PageController@saveuploadpdf')->name('saveuploadpdf');
Route::any('pdflist','PageController@pdflist')->name('pdflist');
Route::any('deletepdf/{id}','PageController@deletepdf')->name('deletepdf');
Route::any('/setting', 'SettingController@setting')->name('setting');
Route::post('/savesetting', 'SettingController@saveSetting')->name('savesetting');
Route::any('copypage/{id}','PageController@copyPageContent')->name('copypage');
Route::any('deletebannerimage/{id}','PageController@deletePageBannerImage')->name('deletebannerimage');

