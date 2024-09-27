<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    public function store(ProductRequest $request, Product $product)
{
    //validation tanpa menggunakan php artisan make:request
    // Validate the request
    // $request->validate([
    //     'product_name' => 'required|string|max:255', // Ensures product_name is provided
    //     'price' => 'required|numeric|min:0', // Validates price
    // ]);

    // Create the product
    Product::create([
        'product_name' => $request->product_name, // Ensure this is not null
        'price' => $request->price,
        'created_at' => now(), // Automatically use current timestamp
        'updated_at' => now(),
        
    ]);

    return redirect()->route('home')->with('success', 'Product created successfully');
    
}

    public function edit(Request $request, Product $product)
    {
        $this->authorize('edit',$product);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
        ]);

        return redirect()->route('home');
    }

    public function destroy(Product $product)
    {
        // ini untuk buat policy (authorize)
        $this->authorize('destroy', $product);
        $product->delete();
        return redirect()->route('home')->with('success', 'Product deleted successfully');
    }

}
