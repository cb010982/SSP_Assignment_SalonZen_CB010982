<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;



class AdminProductController extends Controller
{
    // public function index()
    // {
    //     $products = Product::all();
    //     return view('admin.products.index', compact('products'));
    // }

    public function index()
    {
        $products = Product::all(); 
        return view('admin.products.index', compact('products'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
   
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }
    
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required,' . $product->id,
            'price' => 'required' .$product->id,
            'stocks' => 'required' .$product->id,
           
        ]);

        $product->update($validatedData);

        return redirect()->route('admin.products.index');
    }
    public function ajaxUpdate(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stocks = $request->stocks;
        $product->save();
    
        return response()->json(['success' => true]);
    }
//     public function ajaxCreate(Request $request)
// {
//     $product = new Product;
//     $product->name = $request->input('name');
//     $product->description = $request->input('description');
//     $product->price = $request->input('price');

//     if ($product->save()) {
//         return response()->json(['status' => 'success', 'message' => 'Product created successfully.']);
//     } else {
//         return response()->json(['status' => 'error', 'message' => 'There was a problem creating the product.']);
//     }
// }
   
public function ajaxCreate(Request $request)
{
    $product = new Product;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->stocks = $request->stocks;
    $product->save();
    
    return response()->json(['success' => true]);
}


}
