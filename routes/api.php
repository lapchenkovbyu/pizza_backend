<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/getPizzas', 'Api\GetPizzaListController');
Route::get('/getOrders', 'Api\OrdersListController');
Route::post('/placeOrder', 'Api\PlaceOrderController');
