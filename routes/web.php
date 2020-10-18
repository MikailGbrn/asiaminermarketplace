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

Route::domain('{account}.myapp.com')->group(function () {
    Route::get('user/', function ($account, $id) {
        echo "wakwaw";
    });
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
