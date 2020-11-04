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

Auth::routes(['verify' => true]);

Route::get('company/login', 'CompanyAdmin\CompanyAuth@showLogin')->name('company.login');
Route::get('company/register', 'CompanyAdmin\CompanyAuth@showRegister');
Route::post('company/login', 'CompanyAdmin\CompanyAuth@Login');
Route::post('company/register', 'CompanyAdmin\CompanyAuth@Register');
Route::get('company/logout', 'CompanyAdmin\CompanyAuth@Logout');


Route::prefix('company-profile')->middleware(['auth:admin-company','subscription'])->group( function(){
    Route::get('/','CompanyAdmin\DashboardCompany@index');
    Route::get('/edit','CompanyAdmin\DashboardCompany@showEditCompany');
    Route::get('/product/statistic','CompanyAdmin\DashboardCompany@showStatisticProduct');
    Route::get('/media/statistic','CompanyAdmin\DashboardCompany@showStatisticMedia');
    Route::post('/edit','CompanyAdmin\DashboardCompany@editCompany');
    Route::post('/about','CompanyAdmin\DashboardCompany@editAbout');
    

    
    Route::get('/product','CompanyAdmin\ProductCompany@showProduct');
    Route::get('/product/add','CompanyAdmin\ProductCompany@showAddProduct');
    Route::get('/product/{id}','CompanyAdmin\ProductCompany@showEditProduct');
    Route::post('/product','CompanyAdmin\ProductCompany@addProduct');
    Route::put('/product','CompanyAdmin\ProductCompany@editProduct');
    Route::delete('/product','CompanyAdmin\ProductCompany@deleteProduct');

    Route::get('/media','CompanyAdmin\MediaCompany@showMedia');
    Route::get('/media/add','CompanyAdmin\MediaCompany@showAddMedia');
    Route::get('/media/{id}','CompanyAdmin\MediaCompany@showEditMedia');
    Route::post('/media','CompanyAdmin\MediaCompany@addMedia');
    Route::put('/media','CompanyAdmin\MediaCompany@editMedia');
    Route::delete('/media','CompanyAdmin\MediaCompany@deleteMedia');

    Route::get('/news','CompanyAdmin\NewsCompany@showNews');
    Route::get('/news/add','CompanyAdmin\NewsCompany@showAddNews');
    Route::get('/news/{id}','CompanyAdmin\NewsCompany@showEditNews');
    Route::post('/news','CompanyAdmin\NewsCompany@addNews');
    Route::put('/news','CompanyAdmin\NewsCompany@editNews');
    Route::delete('/news','CompanyAdmin\NewsCompany@deleteNews');

    Route::get('/project','CompanyAdmin\ProjectCompany@showProject');
    Route::get('/project/add','CompanyAdmin\ProjectCompany@showAddProject');
    Route::get('/project/{id}','CompanyAdmin\ProjectCompany@showEditProject');
    Route::post('/project','CompanyAdmin\ProjectCompany@addProject');
    Route::put('/project','CompanyAdmin\ProjectCompany@editProject');
    Route::delete('/project','CompanyAdmin\ProjectCompany@deleteProject');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('/company', 'CompanyController@find')->name('company');
Route::get('/company/{slug}', 'CompanyController@detail');
Route::get('/company/{slug}/media', 'CompanyController@showCompanyMedia');
Route::get('/company/{slug}/product', 'CompanyController@showCompanyProduct');
Route::get('/company/{slug}/news', 'CompanyController@showCompanyNews');
Route::get('/company/{slug}/project', 'CompanyController@showCompanyProject');
Route::get('/company/{slug}/about', 'CompanyController@showCompanyAbout');

Route::get('/project/{CompanyId}/{slug}','ProductController@detail');
Route::get('/news/{CompanyId}/{slug}','NewsController@detail');

Route::get('/product', 'ProductController@find')->name('product');
Route::get('/product/{CompanyId}/{slug}','ProductController@detail');
Route::post('product/addquotation', 'ProductController@addQuotation');

Route::get('/search', 'MediaController@find');
Route::get('/resource/{CompanyId}/{slug}','MediaController@detail');
Route::get('/download-resource/{Uuid}','MediaController@download');
