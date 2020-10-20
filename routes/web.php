<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('company/login', 'CompanyAdmin\CompanyAuth@showLogin')->name('company.login');
Route::get('company/register', 'CompanyAdmin\CompanyAuth@showRegister');
Route::post('company/login', 'CompanyAdmin\CompanyAuth@Login');
Route::post('company/register', 'CompanyAdmin\CompanyAuth@Register');
Route::get('company/logout', 'CompanyAdmin\CompanyAuth@Logout');


Route::prefix('company-profile')->middleware('auth:admin-company')->group( function(){
    Route::get('/','CompanyAdmin\DashboardCompany@index');
    
    Route::get('/product','CompanyAdmin\ProductCompany@showProduct');
    Route::post('/product','CompanyAdmin\ProductCompany@addProduct');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/company', 'CompanyController@find')->name('company');
Route::get('/company/{slug}', 'CompanyController@detail');
Route::get('/company/{slug}/media', 'CompanyController@showCompanyMedia');
Route::get('/company/{slug}/product', 'CompanyController@showCompanyProduct');

Route::get('/product', 'ProductController@find')->name('product');
Route::get('/product/{CompanyId}/{slug}','ProductController@detail');

Route::get('/search', 'MediaController@find');
Route::get('/resource/{CompanyId}/{slug}','MediaController@detail');
Route::get('/download-resource/{Uuid}','MediaController@download');
