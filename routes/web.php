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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Route::get('/articles', 'ArticleController@index');

Route::get('/articles/{post_name}', 'ArticleController@show');

//Demande du formulaire lors de l'appel de l'url contact
Route::get('/contact', 'ContactController@create');

//Route pour la soumission du formulaire
Route::post('/contact', 'ContactController@store');


