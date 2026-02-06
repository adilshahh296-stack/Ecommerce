<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $items = [];
        $total = 0;

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $product->price * $quantity,
                ];
                $total += $product->price * $quantity;
            }
        }

        $tax = $total * 0.05;
        $grandTotal = $total + $tax;

        return view('checkout.index', compact('items', 'total', 'tax', 'grandTotal'));
    }

    public function store(): RedirectResponse
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        // Get form data
        $name = request('name');
        $email = request('email');
        $phone = request('phone');
        $address = request('address');
        $city = request('city');
        $zip = request('zip');
        $paymentMethod = request('payment_method', 'cod');

        // Validate
        if (!$name || !$email || !$phone || !$address || !$city || !$zip) {
            return back()->with('error', 'All delivery fields are required');
        }

        // Validate card details if card payment selected
        if ($paymentMethod !== 'cod') {
            $cardName = request('card_name');
            $cardNumber = request('card_number');
            $cardExpiryMonth = request('card_expiry_month');
            $cardExpiryYear = request('card_expiry_year');
            $cardCvv = request('card_cvv');

            if (!$cardName || !$cardNumber || !$cardExpiryMonth || !$cardExpiryYear || !$cardCvv) {
                return back()->with('error', 'All card details are required');
            }

            // Basic validation
            if (strlen($cardNumber) < 13 || strlen($cardNumber) > 19) {
                return back()->with('error', 'Invalid card number');
            }

            if (strlen($cardCvv) < 3 || strlen($cardCvv) > 4) {
                return back()->with('error', 'Invalid CVV');
            }

            if (strlen($cardExpiryMonth) !== 2 || strlen($cardExpiryYear) !== 2) {
                return back()->with('error', 'Invalid expiry date');
            }
        }

        // Calculate totals
        $total = 0;
        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                $total += $product->price * $quantity;
            }
        }

        $tax = $total * 0.05;
        $grandTotal = $total + $tax;

        // Create order
        $order = Order::create([
            'order_number' => 'ORD-' . date('YmdHis') . rand(1000, 9999),
            'customer_name' => $name,
            'customer_email' => $email,
            'customer_phone' => $phone,
            'shipping_address' => $address . ', ' . $city . ' ' . $zip,
            'payment_method' => $paymentMethod,
            'total_amount' => $grandTotal,
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'unit_price' => $product->price,
                    'total_price' => $product->price * $quantity,
                ]);

                // Reduce product stock
                $product->decrement('stock', $quantity);
            }
        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('order.success', $order)->with('success', 'Order placed successfully!');
    }

    public function success(Order $order): View
    {
        $items = $order->items;
        return view('checkout.success', compact('order', 'items'));
    }
}
