<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function store(Request $request)
    {
        //validation tanpa menggunakan php artisan make:request
        // Validate the form data
        $validated = $request->validate([
            'order_date' => 'required|date',  // Ensure order_date is present and valid
            'order_total' => 'required|numeric',
            'payment_type' => 'required|string',
        ]);
    
        // Create the order
        Order::create([
            'user_id' => auth()->id(),
            'order_date' => $request->order_date,  // Ensure this is not null
            'order_total' => $request->order_total,
            'payment_type' => $request->payment_type,
        ]);
    
        // Redirect with success message
        return redirect()->route('home')->with('success', 'Order created successfully');
    }

    public function edit(Request $request, Order $order)
    {
        $this->authorize('edit',$order);
        return view('order.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'order_date' => $request->order_date,
            'order_total' => $request->order_total,
            'payment_type' => $request->payment_type,
        ]);
    }

    public function destroy(Order $order)
    {
        // ini untuk buat policy (authorize)
         $this->authorize('destroy', $order);
        $order->delete();
        return redirect()->route('home');
    }

}
