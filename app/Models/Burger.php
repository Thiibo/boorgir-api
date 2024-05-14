<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Burger extends Model
{
    use HasFactory;

    protected $fillable = ['price'];

    public function translations()
    {
        return $this->hasMany(BurgerLanguage::class, 'item_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}
