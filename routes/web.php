<?php


use Illuminate\Support\Facades\Route;


Route::get('/','MainController@index')->name('main');

Route::resource('products', 'ProductController');
//->only(['index','show','create']);
//->except(['update','store','destroy']);

/* Route::get('products','ProductController@index')->name('products.index');

Route::get('products/create','ProductController@create')->name('products.create');

Route::post('products','ProductController@store')->name('products.store');

Route::get('products/{product}','ProductController@show')->name('products.show');
// Route::get('products/{product:title}','ProductController@show')->name('products.show'); 

Route::get('products/{product}/edit','ProductController@edit')->name('products.edit');

Route::match(['put','patch'], 'products/{product}', 'ProductController@update')->name('products.update');

Route::delete('productos/{product}','ProductController@destroy')->name('products.destroy'); */ 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
