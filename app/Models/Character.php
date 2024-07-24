<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'attack', 'defence', 'speed', 'life', 'description', 'type_id'];


    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('qty');
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
