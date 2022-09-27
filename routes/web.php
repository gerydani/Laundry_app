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

Route::get('/', 'HomeController@index')->name('Home');
Route::get('/receipt/{id}', 'HomeController@receipt')->name('Receipt');
Route::get('/receipt', 'HomeController@receiptAll')->name('ReceiptAll');
Route::post('/transaction', 'HomeController@store');
Route::delete('/receipt/delete/{id}', 'HomeController@destroy')->name('DeleteReceipt');
