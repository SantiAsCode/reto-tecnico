<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Http;

class MarketTransactions extends Component
{
    // #[Reactive]
    public $market_trasactions;

    public function fetchData()
    {
        $response = Http::get(config('app.manager')."/api/get-market-trasactions")->json();
        if ($response != null) {
            $this->market_trasactions = $response['market_history'];
        }
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.market-trasactions')->with([
            'market_trasactions' => $this->market_trasactions,
        ]);
    }
}
