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

Route::get('/', 'WelcomeController@index')->name('main.index');

Route::post('/search', 'WelcomeController@search')->name('main.search');
Route::get('/search', 'WelcomeController@searchResults')->name('main.searchResults');

Auth::routes();

// Check Username AJAX

Route::post('/register/checkusername', 'Auth\RegisterController@checkusername')->name('checkusername');

//

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');

// Admin / Users
Route::get('/admin/dashboard/users', 'AdminController@indexUsers')->name('admin.index.users');
Route::delete('/admin/dashboard/user/{id}', 'AdminController@destroyUser')->name('admin.delete.user');
Route::get('/admin/dashboard/user/{id}', 'AdminController@showUser')->name('admin.show.user');
Route::put('/admin/dashboard/user/{id}', 'AdminController@editUser')->name('admin.edit.user');
Route::post('/admin/dashboard/users/add', 'AdminController@addUser')->name('admin.add.user');
Route::post('/admin/dashboard/users/search', 'AdminController@searchUsers')->name('admin.search.users');
Route::get('/admin/dashboard/user/{id}/generate/password', 'AdminController@generatePassword')->name('admin.generate.password.user');


// Admin / Roles

Route::get('/admin/dashboard/roles', 'AdminController@indexRoles')->name('admin.index.roles');
Route::delete('/admin/dashboard/role/{id}', 'AdminController@destroyRole')->name('admin.delete.role');
Route::get('/admin/dashboard/role/{id}', 'AdminController@showRole')->name('admin.show.role');
Route::put('/admin/dashboard/role/{id}', 'AdminController@editRole')->name('admin.edit.role');
Route::post('/admin/dashboard/roles', 'AdminController@addRole')->name('admin.add.role');


// Admin / Permissions

Route::get('/admin/dashboard/permissions', 'AdminController@indexPermissions')->name('admin.index.permissions');
Route::delete('/admin/dashboard/permission/{id}', 'AdminController@destroyPermission')->name('admin.delete.permission');
Route::get('/admin/dashboard/permission/{id}', 'AdminController@showPermission')->name('admin.show.permission');
Route::put('/admin/dashboard/permission/{id}', 'AdminController@editPermission')->name('admin.edit.permission');
Route::post('/admin/dashboard/permissions', 'AdminController@addPermission')->name('admin.add.permission');


// Admin / Assets

Route::get('/admin/dashboard/assets/', 'AssetController@adminIndex')->middleware('role:admin|moderator')->name('admin.index.assets');
Route::delete('/admin/dashboard/asset/{id}', 'AssetController@adminDestroy')->middleware('role:admin|moderator')->name('admin.delete.asset');
Route::get('/admin/dashboard/asset/{id}', 'AssetController@adminShow')->middleware('role:admin|moderator')->name('admin.show.asset');
Route::put('/admin/dashboard/asset/{id}', 'AssetController@adminEdit')->middleware('role:admin|moderator')->name('admin.edit.asset');
Route::post('/admin/dashboard/asset/', 'AssetController@adminAdd')->middleware('role:admin|moderator')->name('admin.add.asset');
Route::post('/admin/dashboard/assets/search', 'AssetController@adminSearchAssets')->middleware('role:admin|moderator')->name('admin.search.assets');

// Admin Approve Assets

Route::get('/admin/dashboard/approve/assets', 'AssetController@indexToApprove')->middleware('role:admin|moderator')->name('admin.index.approve.assets');
Route::post('/admin/dashboard/approve/assets/{id}', 'AssetController@adminApprove')->middleware('role:admin|moderator')->name('admin.approve.asset');


// Admin / Downloads

Route::post('/admin/download/{assetId}', 'DownloadController@adminAdd')->middleware('role:admin|moderator')->name('admin.download.add');
Route::delete('/admin/download/{id}', 'DownloadController@adminDelete')->middleware('role:admin|moderator')->name('admin.download.delete');


// Admin / Contests

Route::get('/admin/dashboard/contests/', 'ContestController@adminIndex')->middleware('role:admin|moderator')->name('admin.index.contests');
Route::delete('/admin/dashboard/contest/{id}', 'ContestController@adminDestroy')->middleware('role:admin|moderator')->name('admin.delete.contest');
Route::get('/admin/dashboard/contest/{id}', 'ContestController@adminShow')->middleware('role:admin|moderator')->name('admin.show.contest');
Route::put('/admin/dashboard/contest/{id}', 'ContestController@adminEdit')->middleware('role:admin|moderator')->name('admin.edit.contest');
Route::post('/admin/dashboard/contest/', 'ContestController@adminAdd')->middleware('role:admin|moderator')->name('admin.add.contest');
Route::post('/admin/dashboard/contests/search', 'ContestController@adminSearchContests')->middleware('role:admin|moderator')->name('admin.search.contests');


// Admin / Tags

Route::get('/admin/dashboard/tags/', 'TagController@adminIndex')->middleware('role:admin|moderator')->name('admin.index.tags');
Route::delete('/admin/dashboard/tag/{id}', 'TagController@adminDestroy')->middleware('role:admin|moderator')->name('admin.delete.tag');
Route::get('/admin/dashboard/tag/{id}', 'TagController@adminShow')->middleware('role:admin|moderator')->name('admin.show.tag');
Route::put('/admin/dashboard/tag/{id}', 'TagController@adminEdit')->middleware('role:admin|moderator')->name('admin.edit.tag');
Route::post('/admin/dashboard/tag/', 'TagController@adminAdd')->middleware('role:admin|moderator')->name('admin.add.tag');
Route::post('/admin/dashboard/tags/search', 'TagController@adminSearchTags')->middleware('role:admin|moderator')->name('admin.search.tags');


// Admin / Categories

Route::get('/admin/dashboard/categories/', 'CategoryController@adminIndex')->middleware('role:admin|moderator')->name('admin.index.categories');
Route::delete('/admin/dashboard/categorie/{id}', 'CategoryController@adminDestroy')->middleware('role:admin|moderator')->name('admin.delete.category');
Route::get('/admin/dashboard/category/{id}', 'CategoryController@adminShow')->middleware('role:admin|moderator')->name('admin.show.category');
Route::put('/admin/dashboard/category/{id}', 'CategoryController@adminEdit')->middleware('role:admin|moderator')->name('admin.edit.category');
Route::post('/admin/dashboard/category/', 'CategoryController@adminAdd')->middleware('role:admin|moderator')->name('admin.add.category');
Route::post('/admin/dashboard/categories/search', 'CategoryController@adminSearchCategories')->middleware('role:admin|moderator')->name('admin.search.categories');


// Admin / Comments

Route::get('/admin/dashboard/comments/', 'CommentController@adminIndex')->middleware('role:admin|moderator')->name('admin.index.comments');
Route::delete('/admin/dashboard/comment/{id}', 'CommentController@adminDestroy')->middleware('role:admin|moderator')->name('admin.delete.comment');
Route::get('/admin/dashboard/comment/{id}', 'CommentController@adminShow')->middleware('role:admin|moderator')->name('admin.show.comment');
Route::put('/admin/dashboard/comment/{id}', 'CommentController@adminEdit')->middleware('role:admin|moderator')->name('admin.edit.comment');
Route::post('/admin/dashboard/comment/', 'CommentController@adminAdd')->middleware('role:admin|moderator')->name('admin.add.comment');
Route::post('/admin/dashboard/comments/search', 'CommentController@adminSearchcomments')->middleware('role:admin|moderator')->name('admin.search.comments');



// Admin / Reports

Route::get('/admin/dashboard/reports/', 'ReportController@adminIndex')->middleware('role:admin|moderator')->name('admin.index.reports');
Route::delete('/admin/dashboard/report/{id}', 'ReportController@adminDestroy')->middleware('role:admin|moderator')->name('admin.delete.report');
Route::get('/admin/dashboard/report/{id}', 'ReportController@adminShow')->middleware('role:admin|moderator')->name('admin.show.report');
Route::put('/admin/dashboard/report/{id}', 'ReportController@adminEdit')->middleware('role:admin|moderator')->name('admin.edit.report');
Route::post('/admin/dashboard/report/', 'ReportController@adminAdd')->middleware('role:admin|moderator')->name('admin.add.report');
Route::post('/admin/dashboard/report/search', 'ReportController@adminSearchReports')->middleware('role:admin|moderator')->name('admin.search.reports');


// Assets Add
Route::get('/add/asset/{category?}', 'AssetController@create')->middleware('role:user')->name('create.asset');
Route::post('/add/asset/{category}', 'AssetController@store')->middleware('role:user')->name('store.asset');


// Contest

Route::get('/add/contest', 'ContestController@create')->name('create.contest');
Route::post('/add/contest', 'ContestController@store')->name('store.contest');


// Asset

Route::get('/asset/{url}', 'AssetController@show')->name('show.asset');



// Users

Route::get('/u/{username}', 'UserController@showProfile')->name('user.profile.show');
Route::get('/u/{username}/setup', 'UserController@setupProfilePage')->middleware('role:user')->name('user.profile.setup.show');
Route::put('/u/{username}/setup', 'UserController@setupProfileRequest')->middleware('role:user')->name('user.profile.setup.request');
Route::get('/u/{username}/changepassword', 'UserController@changePasswordPage')->middleware('role:user')->name('user.profile.password.show');
Route::post('/u/{username}/changepassword', 'UserController@changePasswordRequest')->middleware('role:user')->name('user.profile.password.request');


// Tags

Route::get('/tags', 'TagController@index')->middleware('role:user')->name('index.tags');

// Comments

Route::post('/comment/create/{encryptedId}', 'CommentController@store')->middleware('role:user')->name('add.comment');
Route::delete('/comment/delete/{id}', 'CommentController@destroy')->middleware('role:user')->name('delete.comment');

// Reports

Route::post('/reports/add/{type}', 'ReportController@store')->middleware('role:user')->name('add.report');


// Get Tags AJAX

Route::post('/suggest/tags/', 'TagController@suggestTags')->middleware('role:user')->name('suggest.tags');

// Downloads

Route::get('/download/{id}', 'DownloadController@downloadDownload')->name('download.download');