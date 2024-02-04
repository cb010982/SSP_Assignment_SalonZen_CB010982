<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('carts');
    }
    
    public function showproduct()
    {
        $products = Product::all();
        return view('cart', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required|string|max:255',
            'cart_data' => 'required',
        ]);
    
        $userId = Auth::id();
        $cartData = json_decode($validatedData['cart_data'], true);
    
        foreach ($cartData as $item) {
            
            $product = Product::where('name', $item['name'])->first();
    
            if ($product) {
                
                if ($product->stocks >= $item['quantity']) {
                   
                    $product->stocks -= $item['quantity'];
                    $product->save();
                } else {
                  
                    return back()->with('error', 'Insufficient stock for ' . $product->name);
                }
            }
        }
    
      
        $cart = new Cart;
        $cart->user_id = $userId;
        $cart->price = $validatedData['price'];
        $cart->cart_data = $validatedData['cart_data'];
        $cart->save();
    
        return back()->with('success', 'Cart created successfully');
    }
    public function showForm()
    {
        return view('carts');
    }
    
    public function show($id)
{
    $product = Product::find($id);

    return view('cart', compact('product'));
}

public function showCart()
    {
        
        $userId = Auth::id();

       
        $cartItems = Cart::where('user_id', $userId)->get();

       
        return view('carthistory', compact('cartItems'));
    }

}
