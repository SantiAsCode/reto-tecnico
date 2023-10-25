<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Http;

class IngredientsStocks extends Component
{
    // #[Reactive]
    public $ingredients_stocks;

    public function fetchData()
    {
        $response = Http::get(config('app.manager')."/api/get-ingredients-stocks")->json();
        if ($response != null) {
            $this->ingredients_stocks = $response['ingredients_stocks'];
        }
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
