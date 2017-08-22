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

Route::get('/', 'Visitor\PageController@homePage')->name('visitor.index');
Route::get('/about-us', 'Visitor\PageController@aboutUsPage')->name('visitor.about_us');
Route::get('/history', 'Visitor\PageController@historyPage')->name('visitor.history');
Route::get('/contact', 'Visitor\PageController@contactPage')->name('visitor.contact');
Route::get('/search/tag', 'Visitor\PageController@searchTag')->name('visitor.tag.search');

Route::get('/projects', 'Visitor\PageController@projectPage')->name('visitor.projects');
Route::get('/project/{slug}', 'Visitor\PageController@projectDetail')->name('visitor.project.detail');

Route::get('/services', 'Visitor\PageController@servicePage')->name('visitor.services');
Route::get('/service/{slug}', 'Visitor\PageController@serviceDetail')->name('visitor.service.detail');

Route::get('/blogs', 'Visitor\PageController@blogPage')->name('visitor.blog');
Route::get('/blog/{slug}', 'Visitor\PageController@blogDetail')->name('visitor.blog.detail');


// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
//     Voyager::routes();
// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
