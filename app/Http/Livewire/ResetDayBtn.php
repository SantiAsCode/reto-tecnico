<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ResetDayBtn extends Component
{
    public function resetDay()
    {
        try {
            $response = Http::get(config('app.kitchen')."/api/reset-day");
        } catch (\Throwable $th) {
            Log::channel('restaurant')->error("App\Livewire\ResetDayBtn::resetDay() ERROR:{$th}");
        }
    }

    public function render()
    {
        return view('livewire.reset-day-btn');
    }
}
