<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Ingredient extends Model
{
    const NAME_TRANSLATE = [
        'tomato' => 'Tomate',
        'lemon' => 'Limón',
        'potato' => 'Papa',
        'rice' => 'Arroz',
        'ketchup' => 'Ketchup',
        'lettuce' => 'Lechuga',
        'onion' => 'Cebolla',
        'cheese' => 'Queso',
        'meat' => 'Carne',
        'chicken' => 'Pollo',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'quantity',
    ];

    /**
     * Use ingredient stocked quantity.
     *
     * @param  int  $quantity
     */
    public function useStock(int $quantity): void
    {
        $this->quantity -= $quantity;
        $this->save();
        Log::channel('ingredient')->info("Ingredient USED name:{$this->name} Amount:{$quantity}");
    }
    
    /**
     * Refill ingredient stocked quantity.
     *
     * @param  int  $quantity
     */
    public function refillStock(int $quantity): void
    {
        $this->quantity += $quantity;
        $this->save();
        Log::channel('ingredient')->info("Ingredient REFILL name:{$this->name} Amount:{$quantity}");
    }
}
