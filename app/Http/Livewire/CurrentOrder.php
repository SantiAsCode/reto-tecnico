<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CurrentOrder extends Component
{
    public $current_order = [
        'id' => '--',
        'recipe_name' => '--',
        'status' => 'none',
    ];

    public function fetchData()
    {
        $response = Http::get(config('app.manager')."/api/get-current-order")->json();
        if ($response != null) {
            $this->current_order = $response['current_order'];
        }
    }
    
    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.current-order')->with([
            'current_order' => $this->current_order,
        ]);
    }
}
