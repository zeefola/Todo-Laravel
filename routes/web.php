<?php

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


Route::get('/home' , 'TodoController@index');


Auth::routes();


/** Route for Todo */
Route::middleware('auth')->group(function(){
  
  Route::get('/' , 'TodoController@index');


  /** Display form to create todo */
  Route::get('/create' , 'TodoController@create');
  /** Todo incoming request validation and data storage */
  Route::post('/create-todo' , 'TodoController@createTodo');


  /** Display User's created Todo */
  Route::get('/todos', 'TodoController@listTodo');
  
  
  /** Populate Edit Form with todo data */
  Route::get('/edit-todo/{id}', 'TodoController@editTodo')->name('editTodo');
  /** Update and store todo data in the database */
  Route::post('/edit-confirm/{id}', 'TodoController@editConfirm')->name('todoEdit');
  

 /** Delete Todo */
  Route::get('/delete-todo/{id}', 'TodoController@deleteTodo')->name('deleteTodo');
});