<?php

namespace App\Livewire;

use Livewire\Component;
// use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Http;

class MarketTransactions extends Component
{
    // #[Reactive]
    public $market_trasactions;

    public function fetchData()
    {
        $this->market_trasactions = json_decode(Http::get(config('app.manager')."/api/get-market-trasactions"))?->market_history;
        // $this->market_trasactions = Http::get("https://".config('app.manager')."/api/get-market-trasactions")->json();
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
