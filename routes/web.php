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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', 'indexController@login');
Route::get('/logout', 'indexController@logout');

Route::get('/', 'indexController@index');
Route::get('/*********Type/{type_id}', 'indexController@get_*********Type');
Route::get('/*********/{id}', 'indexController@get_*********');
Route::match(array('GET','POST'), '/insert*********/{id}/{login}', 'indexController@insert_*********');
Route::get('/*********Result/{id}', 'indexController@get_*********Result');
Route::get('/preview/{id}', 'indexController@get_*********_preview')->middleware("cors");
Route::get('/done/{id}/{login}', 'indexController@done');
Route::get('/register', 'indexController@register');
Route::get('/register/done', function(){
    return view('register_done')
                            ->with('meta_title', '*********民調')
                            ->with('meta_desc', '體察生活大小事，全民意見報你知！各式議題的民意調查，客觀呈現不同聲音與想法，蒐羅所有時下趨勢的意見報告，盡在NOW民調。');
});
Route::post('/insert_update_user', 'indexController@insert_update_user');

Route::get('/survey', 'indexController@survey');
Route::get('/pk', 'indexController@pk');
Route::get('/ajax/comment/{topic1}/{topic2}/{page}', 'indexController@ajax_comment');


// Route::get('/rated', 'indexController@rated');
// Route::get('/done', 'indexController@done');
// Route::get('/surveyResult', 'indexController@surveyResult');
// Route::get('/insert_count_data', 'indexController@insert_count_data');
// Route::get('/pk_old', 'indexController@pk_old');
//使用者
Route::group(['prefix' => 'user'], function(){
    //使用者驗證
    Route::group(['prefix' => 'auth'], function(){
        //Facebook登入
        Route::get('/facebook-sign-in', 'UserAuthController@facebookSignInProcess');
        //Facebook登入重新導向授權資料處理
        Route::get('/facebook-sign-in-callback', 'UserAuthController@facebookSignInCallbackProcess');

        //Google登入
        Route::get('/google-sign-in', 'UserAuthController@googleSignInProcess');
        //Google登入重新導向授權資料處理
        Route::get('/google-sign-in-callback', 'UserAuthController@googleSignInCallbackProcess');
    });
});

// Excel Export
Route::get('/export_excel/{id}', 'indexController@export_excel')->middleware("cors");



// for API
Route::get('/api/answer/list', 'apiController@api_being_*********')->middleware("cors");
Route::get('/api/*********PK', 'apiController@api_being_pk_*********')->middleware("cors");
Route::get('/api/baseToJPG', 'apiController@api_baseToJPG')->middleware("cors");