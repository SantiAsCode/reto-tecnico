<?php

namespace App\Livewire;

use Livewire\Component;
// use Livewire\Attributes\Reactive;
use Illuminate\Support\Facades\Http;

class RecipesMenu extends Component
{
    // #[Reactive]
    public $recipes_menu;

    public function fetchData()
    {
        $this->recipes_menu = json_decode(Http::get(config('app.manager')."/api/get-recipes-menu"))?->menu;
        // $this->recipes_menu = Http::get("https://".config('app.manager')."/api/get-recipes-menu")->json();
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
