<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'vegetarian'];
    protected $casts = [
        'vegetarian' => 'boolean'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    public function translations()
    {
        return $this->hasMany(IngredientLanguage::class, 'item_id');
    }
}
