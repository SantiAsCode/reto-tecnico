<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MakeOrderBtn extends Component
{
    public function makeAnOrder()
    {
        try {
            $response = Http::get(config('app.kitchen')."/api/queue-an-order");
            if ($response->successful()) {
                Log::channel('restaurant')->info("App\Livewire\MakeOrderBtn::makeOrder() SUCCESSFULLY QUEUED");
            } else {
                Log::channel('restaurant')->error("App\Livewire\MakeOrderBtn::makeOrder() FAILED TO QUEUE");
            }
        } catch (\Throwable $th) {
            Log::channel('restaurant')->error("App\Livewire\MakeOrderBtn::makeOrder() ERROR:{$th}");
        }
    }

    public function render()
    {
        return view('livewire.make-order-btn');
    }
}
