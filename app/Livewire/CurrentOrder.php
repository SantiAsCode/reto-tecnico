<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
// use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Http;

class CurrentOrder extends Component
{
    // #[Reactive]
    public $current_order;
 
    public function fetchData()
    {
        $this->current_order = json_decode(Http::get(config('app.manager')."/api/get-current-order"));
        $this->current_order = $this->current_order ? $this->current_order->current_order : [
            'id' => '--',
            'recipe_name' => '--',
            'status' => 'none',
        ];
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.current-order')->with([
            'current_order' => $this->current_order,
            'status' => Order::STATUS_TRANSLATE[$this->current_order->status],
        ]);
    }
}
