<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Recipe;
use App\Jobs\PrepareAnOrder;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\MarketTransaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class KitcherController extends Controller
{
    /**
     * Queue a random order to the Kitchen Queue.
    */
    public function queueAnOrder(): JsonResponse
    {
        try {
            // Selects a random recipe from the data base
            $recipe = Recipe::inRandomOrder()->first();

            // Creates an order for with that recipe
            $order = Order::create([
                'recipe_id' => $recipe->id,
                'recipe_name' => $recipe->name,
                'queued_at' => now(),
            ]);

            // Queues the order to the Kitchen's Chef (Worker)
            PrepareAnOrder::dispatch($order)->onQueue('kitchen');

            Log::channel('orders')->info("Order nº:{$order->id} QUEUED");
            Log::channel('kitchen')->info("App\Http\Controllers\Api\KitcherController::queueAnOrder() SUCCESS");
            return response()->json([
                'status' => 'success',
            ], 200);
        } catch (\Throwable $th) {
            Log::channel('kitchen')->error("App\Http\Controllers\Api\KitcherController::queueAnOrder() ERROR:{$th}");
            return response()->json([
                'status' => 'error',
            ], 500);
        }
    }

    /**
     * Reset the day by flushing jobs, refilling every ingredient to the stock of 5 and deleting orders and market transactions.
    */
    public function resetDay()
    {
        try {
            // Deleting pending jobs from DB queue
            Artisan::call('queue:clear', [
                'connection' => 'database',
                '--queue' => 'kitchen',
            ]);

            // Truncate the "orders" and "market_transactions" tables
            Order::truncate();
            MarketTransaction::truncate();

            // Reset all ingredients quantities to 5
            $ingredients = Ingredient::get();
            foreach ($ingredients as $ingredient) {
                $ingredient->quantity = 5;
                $ingredient->save();
            }

            Log::channel('kitchen')->info("App\Http\Controllers\Api\KitcherController::queueAnOrder() SUCCESS");
            return response()->json([
                'status' => 'success',
            ], 200);
        } catch (\Throwable $th) {
            Log::channel('kitchen')->error("App\Http\Controllers\Api\KitcherController::queueAnOrder() ERROR:{$th}");
            return response()->json([
                'status' => 'error',
            ], 500);
        }
    }
}
