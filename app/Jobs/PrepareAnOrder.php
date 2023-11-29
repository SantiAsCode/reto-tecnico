<?php

namespace App\Jobs;

use Throwable;
use App\Models\Order;
use App\Models\Ingredient;
use App\Models\MarketTransaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PrepareAnOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Order $order)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Log::channel('orders')->info("Order nº:{$this->order->id} PREPARING");
            // Marks the order as 'preparing'
            $this->order->status = 'preparing';
            $this->order->save();
            
            // Looks for each ingredient needed for the recipe
            foreach ($this->order->recipe->ingredientList() as $ingredient => $required_quantity) {
                $ingredient = Ingredient::where('name', $ingredient)->first();
                
                // If the amount of the ingredient stock is less than the required quantity tries to buy it
                while ($ingredient->quantity < $required_quantity) {
                    // We mark it as 'delayed' to let the Manager know it's state
                    if ($this->order->status == 'preparing') {
                        $this->order->status = 'delayed';
                        $this->order->save();
                        Log::channel('orders')->info("Order nº:{$this->order->id} DELAYED");
                    }
                    
                    // Tries to buy the ingredient at the API market, if it's successfull adds the amount to the ingredient store
                    $response = Http::get("http://api.com");

                    Log::channel('store')->info("API Market RESPONSE {$response->status()}");
                    // If it's not successfull waits for 0,2 sec to try again
                    if ($response->successful()) {
                        $bought_quantity = $response->json("quantitySold", 0);
                        Log::channel('store')->info("API Market SUCCESS, Ingredient:{$ingredient->name} Amount:{$bought_quantity}");

                        // If the bought quantity is diferent than 0, refills the ingredient stock
                        if ($bought_quantity != 0) {
                            $ingredient->refillStock($bought_quantity);
                        }

                        // Register a market transaction
                        MarketTransaction::create([
                            'ingredient_id'   => $ingredient->id,
                            'ingredient_name' => $ingredient->name,
                            'quantity'        => $bought_quantity,
                        ]);
                    } else {
                        usleep(200);
                    }
                    $ingredient->refresh();
                }
                
                // Ingridient quantity is used for the recipe
                $ingredient->useStock($required_quantity);
            }

            // All ingredients needed are used and the order can be served
            $this->order->status = 'served';
            $this->order->served_at = now();
            $this->order->save();

            Log::channel('orders')->info("Order nº:{$this->order->id} SERVED");
            Log::channel('jobs')->info("App\Jobs\PrepareAnOrder::handle() SUCCESS");
        } catch (\Throwable $th) {
            Log::channel('jobs')->error("App\Jobs\PrepareAnOrder::handle() ERROR:{$th}");
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(Throwable $exception): void
    {
        Log::channel('jobs')->error("App\Jobs\PrepareAnOrder::failed() EXCEPTION:{$exception}");
    }
}
