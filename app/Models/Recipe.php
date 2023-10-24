<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'tomato',
        'lemon',
        'potato',
        'rice',
        'ketchup',
        'lettuce',
        'onion',
        'cheese',
        'meat',
        'chicken',
        'description',
    ];

    /**
     * Get the list of ingredients needed to prepare the recipe.
     *
     * @return array<int>
     */
    public function ingredientList(): array
    {
        return [
            'tomato'  => $this->tomato,
            'lemon'   => $this->lemon,
            'potato'  => $this->potato,
            'rice'    => $this->rice,
            'ketchup' => $this->ketchup,
            'lettuce' => $this->lettuce,
            'onion'   => $this->onion,
            'cheese'  => $this->cheese,
            'meat'    => $this->meat,
            'chicken' => $this->chicken,
        ];
    }
}
