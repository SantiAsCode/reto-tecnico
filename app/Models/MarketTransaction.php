<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MarketTransaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int>
     */
    protected $fillable = [
        'ingredient_id',
        'ingredient_name',
        'quantity',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:H:i:s',
    ];

    /**
     * Get the recipe associated with the order.
     */
    public function ingredient(): HasOne
    {
        return $this->hasOne(Ingredient::class);
    }
}
