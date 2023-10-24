<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\MarketTransaction;
use App\Models\Order;
use App\Models\Recipe;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRestaurantStatus()
    {
        return response()->json([
            'status' => 'success',
            'current_order'      => Order::where('status', 'preparing')->first(),
            'order_list'         => Order::orderByDesc('created_at')->get(),
            'ingredients_stocks' => Ingredient::orderByDesc('name')->get(),
            'market_history'     => MarketTransaction::orderByDesc('created_at')->get(),
        ], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function getCurrentOrder()
    {
        $order = Order::whereIn('status', ['preparing', 'delayed'])->first();
        $order ??= Order::orderByDesc('created_at')->first();
        return response()->json([
            'status' => 'success',
            'current_order' => $order,
        ], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function getOrderList()
    {
        return response()->json([
            'status' => 'success',
            'order_list' => Order::orderByDesc('created_at')->get(),
        ], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function getIngredientsStocks()
    {
        return response()->json([
            'status' => 'success',
            'ingredients_stocks' => Ingredient::orderByDesc('name')->get()->pluck('quantity', 'name'),
        ], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function getMarketTrasactions()
    {
        return response()->json([
            'status' => 'success',
            'market_history' => MarketTransaction::orderByDesc('created_at')->get(),
        ], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function getRecipesMenu()
    {
        return response()->json([
            'status' => 'success',
            'menu' => Recipe::get(),
        ], 200);
    }
}
