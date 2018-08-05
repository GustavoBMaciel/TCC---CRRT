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

Route::auth();

Route::resource('/painel/produtos', 'Painel\ProdutoController');
Route::resource('/painel/beneficiarios', 'Painel\BeneficiarioController');
Route::resource('/painel/usuarios', 'Painel\UserController');
Route::resource('/painel/emprestimos', 'Painel\EmprestimoController');
Route::resource('/painel/reciclagens', 'Painel\ReciclagenController');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('register', ['middleware' => 'admins', 'uses' => 'Auth\RegisterController']);*/

Route::get('/pdf', 'Painel\PDFController@pdf');

Route::get('/site', 'Site\SiteController@index');
Route::get('/site/sobre', 'Site\SiteController@sobre');
Route::get('/site/contato', 'Site\SiteController@contato');
