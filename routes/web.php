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

Route::prefix('books')->group(function () {

    Route::get('','BookController@index')->name('book.index')->middleware('auth');
    Route::get('create', 'BookController@create')->name('book.create')->middleware('auth');
    Route::post('store', 'BookController@store')->name('book.store')->middleware('auth');
    Route::get('edit/{book}', 'BookController@edit')->name('book.edit')->middleware('auth');
    Route::post('update/{book}', 'BookController@update')->name('book.update')->middleware('auth');
    Route::post('delete/{book}', 'BookController@destroy' )->name('book.destroy')->middleware('auth');
    Route::get('show/{book}', 'BookController@show')->name('book.show')->middleware('auth');
    Route::get('search','BookController@search')->name('book.search')->middleware('auth');
    Route::get('filter','BookController@filter')->name('book.filter')->middleware('auth');
    Route::get('/pdf','BookController@generatePDF')->name('book.pdf')->middleware('auth');
    Route::get('pdfBook/{book}','BookController@generateBookPDF')->name('book.pdfbook')->middleware('auth');

});

Route::prefix('authors')->group(function () {

    Route::get('','AuthorController@index')->name('author.index')->middleware('auth');
    Route::get('create', 'AuthorController@create')->name('author.create')->middleware('auth');
    Route::post('store', 'AuthorController@store')->name('author.store')->middleware('auth');
    Route::get('edit/{author}', 'AuthorController@edit')->name('author.edit')->middleware('auth');
    Route::post('update/{author}', 'AuthorController@update')->name('author.update')->middleware('auth');
    Route::post('delete/{author}', 'AuthorController@destroy' )->name('author.destroy')->middleware('auth');
    Route::get('show/{author}', 'AuthorController@show')->name('author.show')->middleware('auth');
    Route::get('search','AuthorController@search')->name('author.search')->middleware('auth');
    Route::get('filter','AuthorController@filter')->name('author.filter')->middleware('auth');
    Route::get('/pdf','AuthorController@generatePDF')->name('author.pdf')->middleware('auth');
    Route::get('pdfAuthor/{author}','AuthorController@generateAuthorPDF')->name('author.pdfauthor')->middleware('auth');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
