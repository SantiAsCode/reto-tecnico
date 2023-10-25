<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Http;

class RecipesMenu extends Component
{
    // #[Reactive]
    public $recipes_menu = null;

    public function fetchData()
    {
        while ($this->recipes_menu == null) {
            $response = Http::get(config('app.manager')."/api/get-recipes-menu")->json();
            if ($response != null) {
                $this->recipes_menu = $response['menu'];
            } else {
                sleep(5);
            }
        }
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.recipes-menu')->with([
            'recipes_menu' => $this->recipes_menu,
        ]);
    }
}
