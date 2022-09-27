<?php

use Illuminate\Support\Facades\Route;
// use Sumon\Warehouse\Http\WarehouseController; 
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

Route::group(['namespace' => 'Magnetism\Warehouse\Http'], function(){

    Route::resource('/warehouses', WarehouseController::class);

});
