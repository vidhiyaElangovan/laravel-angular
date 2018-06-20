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

Route::get('/', function () {
    return view('index');
});

Route::get('/api/v1/employeesdata/{id?}', 'EmployeeController@index');
Route::post('/api/v1/employees', 'EmployeeController@store');
Route::post('/api/v1/employees/{id}', 'EmployeeController@update');
Route::post('/api/v1/employees/search', 'EmployeeController@search');
Route::delete('/api/v1/employees/{id}', 'EmployeeController@destroy');
Route::get('/api/v1/getData/{id?}', 'EmployeeController@getData');
Route::post('/api/v1/addData', 'EmployeeController@addData');
Route::post('/api/v1/editData/{id}', 'EmployeeController@editData');
Route::delete('/api/v1/deleteData/{id}', 'EmployeeController@deleteData');
Route::get('/api/v1/getBlogs/{id?}', 'EmployeeController@getBlogs');
Route::post('/api/v1/addBlog', 'EmployeeController@addBlog');
Route::post('/api/v1/editBlog/{id}', 'EmployeeController@editBlog');
Route::delete('/api/v1/deleteblog/{id}', 'EmployeeController@deleteblog');




