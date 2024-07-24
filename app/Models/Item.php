<?php

namespace App\Models;

use App\Http\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'type', 'category', 'weight', 'unit', 'cost', 'coin', 'damage_dice', 'image', 'description'];


    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}
