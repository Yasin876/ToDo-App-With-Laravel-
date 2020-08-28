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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos' , 'ToDoController@index');
Route::get('/todos/{todo}' , 'ToDoController@show'); //to see details of each todo 
Route::get('/create-todos' , 'ToDoController@create');//this round used to display form 
Route::post('/store-todos' , 'ToDoController@store'); 

//update record 
Route::get('/todos/{todo}/edit' , 'ToDoController@edit');//formu goruntuler verilerle beraber 
Route::post('/update-todos/{todoid}/update' , 'ToDoController@update');//veritabanına formu gönderir.

//delete record 
Route::get('/todos/{todo}/delete' , 'ToDoController@destroy'); //laravel {todo} yu otomatik olarak fonksiyon parametresine atar

//complete 
Route::get('/todos/{todo}/complete' , 'ToDoController@complete');