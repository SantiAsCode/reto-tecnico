<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    /**
     * Display the dashboard of the Restaurant.
    */
    public function index()
    {
        return view('livewire.dashboard');
    }

    public function oldDashboard()
    {
        return view('dashboard');
    }
}
