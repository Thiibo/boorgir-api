<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BurgerLanguage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'lang'];

    protected $hidden = [
        'id',
        'item_id',
        'created_at',
        'updated_at',
    ];
}
