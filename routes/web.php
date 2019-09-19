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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/view_document/{document}', 'HomeController@viewDocument')->name('view_document');

Route::get('/admin', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
Route::post('/admin', ['as'=> 'admin-login','uses'=>'Auth\AdminLoginController@login']);

Route::prefix('admin')->group(function(){
	Route::name('admin.')->group(function () {
		Route::get('/home', 'Admin\DashboardController@index' )->name('index');
		Route::get('/show_document', 'Admin\DashboardController@showDocument')->name('show_document');
		Route::post('/add_doc', 'Admin\DashboardController@uploadDocument' )->name('add_doc');
		Route::get('/destroy_document/{document}', 'Admin\DashboardController@destroyDocument' )->name('destroy_document');
		

		// agents
		Route::get('/show_agents', 'Admin\DashboardController@showAgents')->name('show_agents');
		Route::post('/add_agent', 'Admin\DashboardController@addAgent' )->name('add_agent');
		Route::get('/destroy_agent/{agent}', 'Admin\DashboardController@destroyAgent' )->name('destroy_agent');





		// Déconnexion prof
		Route::post('/admin-logout',function(){
			auth()->logout();
			return redirect()->route('admin-login');
		})->name('logout');
	});





	
});
