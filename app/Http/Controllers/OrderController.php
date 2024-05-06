<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('need_by', 'asc')->paginate(5);

        // Iterate over each order to calculate its production time.
        foreach ($orders as $order) {
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            $productionTime = 0;
            // Calculate the production time for each order item and sum it up.
            foreach ($orderItems as $orderItem) {
                $product = Product::find($orderItem->product_id);
                $productionTime = $productionTime + $this->calculateProductionTime($product->type_id, $orderItem->quantity);
            }
            // Calculate the changeover delay between order items.
            $changeoverDelay = ($orderItems->count() - 1) * 30;
            $productionTime = $productionTime + $changeoverDelay;

            // Convert the total production time to days, hours, and minutes.
            $days = floor($productionTime / (24 * 60));
            $hours = floor(($productionTime % (24 * 60)) / 60);
            $minutes = $productionTime % 60;
            $order->production_time = ($days > 0 ? $days . 'd. ' : '') . ($hours > 0 ? $hours . 'h. ' : '') . $minutes . 'm.';
        }

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
            'products' => 'required|array',
            'quantities' => 'required|array',
            'need_by' => 'required|date',
        ]);

        try {
            $order = new Order();
            $customer = Customer::firstOrCreate(['name' => $request->customer]);
            $order->customer_id = $customer->id;
            $order->need_by = $request->need_by;
            $order->save();

            foreach ($request->products as $key => $product_id) {
                if ($request->quantities[$product_id] > 0) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $product_id;
                    $orderItem->quantity = $request->quantities[$product_id];
                    $orderItem->save();
                }
            }

            return redirect()->back()->with('success', 'Order created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create order. Please try again.');
        }
    }

    /**
     * Calculate the production time required to produce a certain quantity of a product.
     *
     * @param int $productTypeId The ID of the product type.
     * @param int $quantity The quantity of the product to produce.
     * @return int The production time in minutes.
     */
    public function calculateProductionTime(int $productTypeId,  int $quantity): int
    {
        $productionSpeed = ProductType::find($productTypeId)->production_speed;
        $productionTimeInMinutes = ($quantity / $productionSpeed) * 60;

        return $productionTimeInMinutes;
    }
}
