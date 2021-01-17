<?php

use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['logged'])->group(function () {

    Route::get('/', 'CompanyController@index')->name('home');
    Route::get('companies/create', 'CompanyController@create');
    Route::get('companies/{id}/update', 'CompanyController@edit');
    Route::get('companies/{id}/delete', 'CompanyController@destroy');
    Route::get('companies/{id}', 'CompanyController@show')->name('company');

    Route::post('companies/create', 'CompanyController@store');
    Route::post('companies/{id}/update', 'CompanyController@update');
    Route::get('/employees/{id}/create', 'EmployeesController@create')->name('createEmployees');

    Route::post('/employees/{id}/create', 'EmployeesController@store');
});


Route::get('users/login', 'UsersContraller@index')->name('login');
Route::post('users/login', 'UsersContraller@login');
