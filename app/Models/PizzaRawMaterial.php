<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaRawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'pizza_id',
        'raw_material_id',
        'quantity',
    ];


    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }


    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }
}
