<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Http;

class OrderList extends Component
{
    // #[Reactive]
    public $order_list;

    public function fetchData()
    {
        $response = Http::get(config('app.manager')."/api/get-order-list")->json();
        if ($response != null) {
            $this->order_list = $response['order_list'];
        }
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.order-list')->with([
            'order_list' => $this->order_list,
        ]);
    }
}
