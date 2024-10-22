<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relación 1:N con PizzaSize
    public function sizes()
    {
        return $this->hasMany(PizzaSize::class);
    }

    // Relación N con Ingredients a través de pizza_ingredient
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredient');
    }

    // Relación N con RawMaterials a través de pizza_raw_material
    public function rawMaterials()
    {
        return $this->belongsToMany(RawMaterial::class, 'pizza_raw_material');
    }
}
