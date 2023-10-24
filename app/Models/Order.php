<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    const STATUS_TRANSLATE = [
        'none' => '--',
        'queued' => 'En Cola',
        'preparing' => 'En Preparación',
        'delayed' => 'Demorado',
        'served' => 'Servido',
    ];

    const STATUS_COLOR = [
        'none' => 'gray',
        'queued' => 'gray',
        'preparing' => 'blue',
        'delayed' => 'red',
        'served' => 'green',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'recipe_id',
        'recipe_name',
        'status',
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
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
