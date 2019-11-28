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


Auth::routes();

/*Route::get('/', function () {
    return view('Acceuil');
})->name('acceuil');*/

Route::get('/', 'VoituresController@AllVoitureAcceuil')->name('acceuil');
//Route::get('/acceuil', 'VoituresController@AllVoitureAcceuil')->name('acceuil');

//Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Route::get(
	'/connexion',
	function()
	{
		return view('auth.login');
	}
)->name('connexion');

Route::get(
	'/inscription',
	function()
	{
		return view('auth.register');
	}
)->name('inscription');

Auth::routes();

Route::get(
	'/dashboard',
	function()
	{
		return view('dashboard');
	}
)->name('dashboard');

Route::get('/dashboard','VoituresController@AllVoiture')->name('dashboard');

/*Route::get(
	'/dashboard', 'LocationController@Locations'
)->name('dashboard');*/

Route::post(
	'/createVoiture',
	'VoituresController@CreateVoiture'
)->name('createVoiture');

Route::post(
	'/supprimerVoiture',
	'VoituresController@SupprimerVoiture'
)->name('supprimerVoiture');

Route::post(
	'/ModifierVoiture', 'VoituresController@ChoisirVoiture')->name('modifierVoiture');

Route::post('/ModifierVoitureFin','VoituresController@ModifierVoiture')->name('modifierVoitureFin');

Route::post('/rendre', 'LocationController@Rendre')->name('rendre');
Route::post('/louer', 'LocationController@Louer')->name('louer');

/*Route::post('/connexion/verify', 'UtilisateursController@ConnexionVerify');

Route::get(
	'/dashboard',
	function()
	{
		return view('dashboard');
	}
)->name('dashboard');

Route::get(
	'/inscription',
	function()
	{
		return view('inscription');
	}
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/




