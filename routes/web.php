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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Shop', 'prefix' => 'shop'], function (){
    Route::resource('items', 'ItemController')->names('shop.items');
});

$groupData = [
    'namespace' => 'Shop\Admin',
    'prefix'    => 'admin/shop',
];
Route::group($groupData, function (){

    //ShopCategory
    $methods = ['index', 'edit', 'store', 'update', 'create',];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('shop.admin.categories');

    //ShopItem
    Route::resource('items', 'ItemController')
        ->except(['show'])
        ->names('shop.admin.items');
});
