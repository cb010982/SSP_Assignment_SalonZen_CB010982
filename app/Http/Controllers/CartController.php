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
            'name' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'cardholder_name' => 'required|string|max:255',
            'cvc' => 'required|string|max:255',
            'card_number' => 'required|string|max:255',
            'expiry_date' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'cart_data'=>'required'
        ]);

        $userId = Auth::id();

        $cart = new Cart;
        $cart->user_id = $userId;
        $cart ->name = $validatedData['name'];
        $cart ->product = $validatedData['product'];
        $cart ->cvc = $validatedData['cvc'];
        $cart ->cardholder_name = $validatedData['cardholder_name'];
        $cart ->card_number = $validatedData['card_number'];
        $cart ->expiry_date = $validatedData['expiry_date'];
        $cart ->payment_method = $validatedData['payment_method'];
        $cart ->price = $validatedData['price'];
        $cart ->quantity = $validatedData['quantity'];
        $cart ->cart_data = $validatedData['cart_data'];
        $cart ->save();

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
