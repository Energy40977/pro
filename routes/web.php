<?php

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
use Illuminate\Support\Facades\Auth;

Auth::routes();




Route::group(['prefix' => 'control'], function(){
    Route::get('/', 'System\NewsController@index');
    Route::get('/news', 'System\NewsController@news');
    Route::post('/addnews', 'System\NewsController@addnews');
    Route::get('/create-news', 'System\NewsController@createnews');
    Route::get('/editnews/{id}/', 'System\NewsController@editnews');
    Route::post('/editnews', 'System\NewsController@editpost');
    Route::post('/deletenews', 'System\NewsController@deletenews');
    Route::post('/inserturl', 'System\NewsController@inserturl');
    ///////////////////////////////////////////////////////////////
    Route::post('/preview', 'System\NewsController@preview');
    Route::post('/todraft', 'System\NewsController@draft');
    Route::get('/drafts', 'System\NewsController@drafts');
    Route::get('/editdrafts/{id}/', 'System\NewsController@editdrafts');
    Route::post('/publishdraft', 'System\NewsController@publishdraft');
    Route::post('/deletedraft', 'System\NewsController@deletedraft');
    /////////////////////////////////////////////////////////////
    Route::get('/schedules', 'System\NewsController@schedules');
    Route::get('/editschedule/{id}/', 'System\NewsController@editschedule');
    Route::post('/editschedules', 'System\NewsController@editschedules');
    Route::post('/deleteschedules', 'System\NewsController@deleteschedule');
    ///
    Route::get('/category', 'System\CategoryController@category');
    Route::post('/newcat', 'System\CategoryController@newcat');
    Route::post('/editcat', 'System\CategoryController@editcat');
    Route::post('/deletecat', 'System\CategoryController@deletecat');
    ////////////////////////////////////////////////////////////////
    Route::post('/upload', 'System\NewsController@uploads')->name('upload');
    Route::get('banners', 'System\BannerController@index');
    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('ckfinder_connector');

    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('ckfinder_browser');

    Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
        ->name('ckfinder_examples');

    Route::post('images-upload', 'System\NewsController@imagesUploadPost')->name('images.upload');
    Route::post('/deletegal', 'System\NewsController@deletegal')->name('delgal');
});

Route::get('/404', 'Site\MainController@a404')->name('a404');
Route::get('/', 'Site\MainController@index')->name('index');
Route::get('/{cat}/{slug}', 'Site\MainController@single');
Route::post('/search', 'Site\MainController@search');
Route::get('/{cat_id}', 'Site\MainController@category');
Route::get('/preview/1/1', 'Site\MainController@preview');



Route::get('/artisan', function () {
      //gets the artisan command from query string passed
      $data = Request::get('data');
      return \Artisan::call($data);
});






