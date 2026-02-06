<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Show order details
     */
    public function show(Order $order): View
    {
        // Check if user owns this order or is admin
        if (auth()->check() && (auth()->id() === $order->user_id || auth()->user()->is_admin)) {
            return view('orders.show', compact('order'));
        }

        abort(403, 'Unauthorized');
    }

    /**
     * Track order by order number (public)
     */
    public function track(Request $request): View
    {
        $orderNumber = $request->input('order_number');
        $email = $request->input('email');
        $order = null;

        if ($orderNumber && $email) {
            $order = Order::where('order_number', $orderNumber)
                ->where('customer_email', $email)
                ->first();
        }

        return view('orders.track', compact('order'));
    }

    /**
     * Get order status timeline
     */
    public function getTimeline(Order $order): array
    {
        $timeline = [
            'pending' => [
                'status' => 'Pending',
                'date' => $order->created_at,
                'completed' => true,
            ],
            'confirmed' => [
                'status' => 'Confirmed',
                'date' => $order->confirmed_at ?? null,
                'completed' => $order->confirmed_at !== null,
            ],
            'processing' => [
                'status' => 'Processing',
                'date' => $order->processing_at ?? null,
                'completed' => $order->processing_at !== null,
            ],
            'shipped' => [
                'status' => 'Shipped',
                'date' => $order->shipped_at ?? null,
                'completed' => $order->shipped_at !== null,
            ],
            'delivered' => [
                'status' => 'Delivered',
                'date' => $order->delivered_at ?? null,
                'completed' => $order->delivered_at !== null,
            ],
        ];

        return $timeline;
    }
}
