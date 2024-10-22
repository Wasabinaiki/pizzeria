<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'pizza_id',
        'size',
        'price',
    ];

    // Relación inversa con Pizza
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}
