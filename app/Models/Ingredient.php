<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'vegetarian'];

    public function translations()
    {
        return $this->hasMany(IngredientLanguage::class);
    }
}
