<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BurgerLanguage extends Model
{
    use HasFactory;

    protected $hidden = [
        'id',
        'ingredient_id',
        'created_at',
        'updated_at',
    ];
}
