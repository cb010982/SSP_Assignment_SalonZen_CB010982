<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('carts');
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string|in:visa,mastercard',
            'cardholder_name' => 'required|string|max:255',
            'expiry_date' => 'required|date|after:today',
            'card_number' => 'required|string|size:16',
            'cvc' => 'required|string|size:3',
        ]);

        $cart = new Cart;
        $cart->name = $request->input('name');
        $cart->product = $request->input('product');
        $cart->quantity = $request->input('quantity');
        $cart->payment_method = $request->input('payment_method');
        $cart->cardholder_name = $request->input('cardholder_name');
        $cart->expiry_date = $request->input('expiry_date');
        $cart->card_number = $request->input('card_number');
        $cart->cvc = $request->input('cvc');
        $cart->save();

        return redirect()->route('carts.index')->with('success', 'Cart created successfully');
    }
    
    public function showForm()
    {
        return view('carts');
    }
    

}
