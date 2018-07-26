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

Route::get('profile', 'UsersController@profile');
Route::post('profile', 'UsersController@update_avatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// routes: Products
Route::resource('products', 'ProductsController');
Route::get('/products/remove/{id}', 'ProductsController@remove')->name('products.remove');

// routes: Suppliers
Route::resource('suppliers', 'SuppliersController');

// routes: Users
Route::resource('users', 'UsersController');

Route::resource('purchases', 'PurchasesController');
//Route::get('/purchases/create/{id}', 'PurchasesController@create')->name('purchases.create');

Route::resource('requisitions', 'RequisitionsController');


// teste #########################

// tudo o que vier como / products, vai direcionar para o meu controller no metodo @create com o nome (products.purchase.create)
Route::get('/products/{id}/purchases/create', 'PurchasesController@create')->name('products.purchases.create');


Route::resource('tests', 'TestsController');
