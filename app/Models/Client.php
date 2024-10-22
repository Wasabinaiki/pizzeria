<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'phone',
    ];

    // Relación 1:N con Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relación inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
