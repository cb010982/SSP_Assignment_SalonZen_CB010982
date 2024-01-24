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
            // Find the product by name
            $product = Product::where('name', $item['name'])->first();
    
            if ($product) {
                // Check if there are enough stocks
                if ($product->stocks >= $item['quantity']) {
                    // Reduce the stock
                    $product->stocks -= $item['quantity'];
                    $product->save();
                } else {
                    // Handle insufficient stock (You may want to customize this part)
                    return back()->with('error', 'Insufficient stock for ' . $product->name);
                }
            }
        }
    
        // Create the cart entry
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
        // Get the current user's ID
        $userId = Auth::id();

        // Fetch the cart items based on the user ID
        $cartItems = Cart::where('user_id', $userId)->get();

        // Pass the cart items to the view
        return view('carthistory', compact('cartItems'));
    }

}
