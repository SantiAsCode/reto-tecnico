<?php

namespace App\Livewire;

use Livewire\Component;
// use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Http;

class OrderList extends Component
{
    // #[Reactive]
    public $order_list;

    public function fetchData()
    {
        $this->order_list = json_decode(Http::get(config('app.manager')."/api/get-order-list"))->order_list;
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
