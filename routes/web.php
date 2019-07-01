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

// API Category
Route::get('category/api',[
    'as' => 'categories.api',
    'uses' => 'API\CategoryApiController@index'
]);

Route::post('category/store/api',[
    'as' => 'categories.api',
    'uses' => 'API\CategoryApiController@store'
]);

Route::post('category/update/api',[
    'as' => 'categories.api',
    'uses' => 'API\CategoryApiController@update'
]);

Route::get('categories/api',[
    'as' => 'categories.api',
    'uses' => 'API\CategoriesApiController@index'
]);

Route::get('categories/all/api',[
    'as' => 'categories.api',
    'uses' => 'API\CategoriesApiController@all'
]);

// API ITEM
Route::get('items/api',[
    'as' => 'items.api',
    'uses' => 'API\ItemsApiController@index'
]);

Route::get('item/api',[
    'as' => 'items.api',
    'uses' => 'API\ItemApiController@index'
]);

Route::post('item/store/api',[
    'as' => 'items.api',
    'uses' => 'API\ItemApiController@store'
]);

Route::post('item/update/api',[
    'as' => 'items.api',
    'uses' => 'API\ItemApiController@update'
]);
