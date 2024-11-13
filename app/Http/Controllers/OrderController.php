<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Storage;
use File;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        //validation tanpa menggunakan php artisan make:request
        // Validate the form data
        // $validated = $request->validate([
        //     'order_date' => 'required|date',  // Ensure order_date is present and valid
        //     'order_total' => 'required|numeric',
        //     'payment_type' => 'required|string',
        // ]);

        if ($request->hasFile('image')) {
            //rename file
            $fileName = $request->name.'-'.date('Y-m-d').'.'.$request->image->getClientOriginalExtension();
            //simpan gambar file
            Storage::disk('public')->put('/order/'.$fileName, File::get($request->image));
        }
    
        // Create the order
        Order::create([
            'user_id' => auth()->id(),
            'order_date' => $request->order_date,  // Ensure this is not null
            'order_total' => $request->order_total,
            'payment_type' => $request->payment_type,
            'image'=>$fileName ?? 'No image'
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
