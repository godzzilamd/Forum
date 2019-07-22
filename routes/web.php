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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::redirect('/', '/forums');

Route::resource('category', 'CategoryController');
Route::resource('topic', 'TopicController');

Route::resource('section', 'SectionController');

Auth::routes();

Route::redirect('/home', '/forums');

Route::get('/test', 'TestController@test');

Route::get('/forums', 'ForumController@index');

Route::prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index');
});
