<?php

use App\Http\Controllers\Api\KitcherController;
use App\Http\Controllers\Api\ManagerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Kitchen API
Route::get('/queue-an-order', [KitcherController::class, 'queueAnOrder']);
Route::get('/reset-day',      [KitcherController::class, 'resetDay']);

// Manager API
Route::get('/get-restaurant-status',  [ManagerController::class, 'getRestaurantStatus']);
Route::get('/get-current-order',      [ManagerController::class, 'getCurrentOrder']);
Route::get('/get-order-list',         [ManagerController::class, 'getOrderList']);
Route::get('/get-ingredients-stocks', [ManagerController::class, 'getIngredientsStocks']);
Route::get('/get-market-trasactions', [ManagerController::class, 'getMarketTrasactions']);
Route::get('/get-recipes-menu',       [ManagerController::class, 'getRecipesMenu']);