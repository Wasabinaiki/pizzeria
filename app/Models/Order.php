<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'branch_id',
        'total_price',
        'status',
        'delivery_type',
        'delivery_person_id',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    public function pizzaSizes()
    {
        return $this->belongsToMany(PizzaSize::class, 'order_pizza');
    }


    public function extraIngredients()
    {
        return $this->belongsToMany(ExtraIngredient::class, 'order_extra_ingredient');
    }


    public function deliveryPerson()
    {
        return $this->belongsTo(Employee::class, 'delivery_person_id')->withDefault();
    }
}
