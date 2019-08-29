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
    return view('welcome');
});

Route::get('empleado/crear', [
  'as' => 'employee.create',
  'uses' => 'EmployeeController@create'
]);

Route::post('empleado/crear',[
  'as' => 'employee.store',
  'uses' => 'EmployeeController@store'
]);

Route::get('empleado/listar', [
  'as'=>'employee.index',
  'uses' => 'EmployeeController@index'
]);

Route::get('cargo/crear', [
  'as' => 'position.create',
  'uses' => 'EmployeeSalaryController@create'
]);

Route::post('cargo/crear',[
  'as' => 'position.store',
  'uses' => 'EmployeeSalaryController@store'
]);

Route::get('cargo/listar', [
  'as' => 'position.index',
  'uses' => 'EmployeeController@index'
]);

Route::get('empleado/getPosition', [
  'as' => 'position.getPosition',
  'uses' => 'EmployeeController@getPosition'
]);

Route::get('cargo/getPositionAll',[
  'as' => 'position.getPositionAll',
  'uses' => 'EmployeeSalaryController@getPositionAll'
]);
