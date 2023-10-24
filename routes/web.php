<?php

use App\Http\Controllers\Panel\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RestaurantController::class, 'index']);

Route::get('/old-dashboard', [RestaurantController::class, 'oldDashboard']);
