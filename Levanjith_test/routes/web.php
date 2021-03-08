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

 

Route::get('/home', function () {
    return view('home');
});
Route::get('/','TaskController@table');
Route::get('viewdata', 'TaskController@viewdata');
Route::get('add', 'TaskController@add');
Auth::routes();
Route::get('/edit','TaskController@edit');
Route::get('/delete/{id}','TaskController@delete');
Route::get('/table','TaskController@table');
Route::POST('/add_available', 'TaskController@addAvailable');
Route::get('get-clients','TaskController@getclients');
Route::get('get-client-id/{id}','TaskController@getclientid');
Route::post('change-client','TaskController@changeclient');
Route::get('client-del/{id}','TaskController@clientdel');

///
Route::get('phptable','HomeController@phptable'); 
Route::get('newedit/{id}','HomeController@newedit');
Route::get('newdel/{id}','HomeController@newdel');
Route::get('/newupdate','HomeController@newupdate'); 
Route::Post('/postupdate','HomeController@postupdate'); 
Route::get('/search','HomeController@search'); 
Route::get('/shortby_fname','HomeController@short_by'); 
Route::get('/shortby_lname','HomeController@shortbylname'); 
Route::get('/shortby_divition','HomeController@shortbydivition'); 
Route::get('/shortby_dob','HomeController@shortbydob'); 
Route::get('/shortby_dob','HomeController@shortbydob');  
Route::get('/multiserch','HomeController@multiserch'); 
// Route::get('/click','HomeController@click'); 

