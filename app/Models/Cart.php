<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'name',
        'product',
        'quantity',
        'price',
        'payment_method',
        'cardholder_name',
        'expiry_date',
        'card_number',
        'cvc',
    ];
}
