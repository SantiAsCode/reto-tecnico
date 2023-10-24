<?php

namespace App\Livewire;

use Livewire\Component;
// use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Http;

class IngredientsStocks extends Component
{
    // #[Reactive]
    public $ingredients_stocks;

    public function fetchData()
    {
        $this->ingredients_stocks = json_decode(Http::get(config('app.manager')."/api/get-ingredients-stocks"))?->ingredients_stocks;
        // $this->ingredients_stocks = Http::get("https://".config('app.manager')."/api/get-ingredient-stocks")->json();
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.ingredients-stocks')->with([
            'ingredients_stocks' => $this->ingredients_stocks,
        ]);
    }
}
