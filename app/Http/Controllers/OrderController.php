<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required|string',
            'product' => 'required|exists:products,id',
            'need_by' => 'required|date',
        ]);

        try {
            $customer = Customer::firstOrCreate(['name' => $request->customer]);

            $order = new Order();
            $order->customer_id = $customer->id;
            $order->need_by = $request->need_by;
            $order->save();

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $request->product;
            $orderItem->save();

            return redirect()->back()->with('success', 'Order created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create order. Please try again.');
        }
    }
}
