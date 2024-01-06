<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function details()
    {
        return $this->hasMany(CartDetail::class);
    }
 
    protected $fillable = [
        'user_id',
        'name',
        'product',
        'cardholder_name',
        'cvc',
        'card_number',
        'expiry_date',
        'payment_method',
        'price',
        'quantity'
    ];
}
