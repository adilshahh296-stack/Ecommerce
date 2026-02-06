@extends('app')

@section('title', 'Checkout')

@section('content')
<div class="grid grid-cols-3 gap-8">
    <!-- Checkout Form -->
    <div class="col-span-2">
        <h1 class="text-4xl font-bold mb-8 text-[#004B3B]">Checkout</h1>

        <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Customer Information -->
            <div class="bg-white rounded-lg shadow-lg p-8 border-l-4 border-[#50C878]">
                <h2 class="text-2xl font-bold mb-6 text-[#004B3B]">Delivery Information</h2>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold text-[#004B3B] mb-2">Full Name *</label>
                        <input type="text" name="name" required class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="John Doe">
                    </div>
                    <div>
                        <label class="block font-semibold text-[#004B3B] mb-2">Email *</label>
                        <input type="email" name="email" required class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="john@example.com">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block font-semibold text-[#004B3B] mb-2">Phone *</label>
                        <input type="tel" name="phone" required class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="+971 50 123 4567">
                    </div>
                    <div>
                        <label class="block font-semibold text-[#004B3B] mb-2">Zip Code *</label>
                        <input type="text" name="zip" required class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="12345">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block font-semibold text-[#004B3B] mb-2">Street Address *</label>
                    <input type="text" name="address" required class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="123 Main Street">
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block font-semibold text-[#004B3B] mb-2">City *</label>
                        <input type="text" name="city" required class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="Dubai">
                    </div>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="bg-white rounded-lg shadow-lg p-8 border-l-4 border-[#50C878]">
                <h2 class="text-2xl font-bold mb-6 text-[#004B3B]">Payment Method</h2>
                <div class="space-y-3">
                    <!-- Cash on Delivery -->
                    <label class="flex items-center p-4 border-2 border-[#004B3B] rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="payment_method" value="cod" checked class="w-4 h-4 accent-[#50C878]">
                        <span class="ml-3 font-semibold text-[#004B3B]">Cash on Delivery (COD)</span>
                    </label>

                    <!-- Visa -->
                    <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="payment_method" value="visa" class="w-4 h-4 accent-[#50C878]">
                        <i class="fas fa-cc-visa text-2xl text-blue-600 ml-2 mr-3"></i>
                        <span class="font-semibold text-[#004B3B]">Visa Card</span>
                    </label>

                    <!-- Mastercard -->
                    <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="payment_method" value="mastercard" class="w-4 h-4 accent-[#50C878]">
                        <i class="fas fa-cc-mastercard text-2xl text-red-600 ml-2 mr-3"></i>
                        <span class="font-semibold text-[#004B3B]">Mastercard</span>
                    </label>

                    <!-- Credit Card -->
                    <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="payment_method" value="credit" class="w-4 h-4 accent-[#50C878]">
                        <i class="fas fa-credit-card text-2xl text-purple-600 ml-2 mr-3"></i>
                        <span class="font-semibold text-[#004B3B]">Credit Card</span>
                    </label>

                    <!-- Debit Card -->
                    <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                        <input type="radio" name="payment_method" value="debit" class="w-4 h-4 accent-[#50C878]">
                        <i class="fas fa-credit-card text-2xl text-green-600 ml-2 mr-3"></i>
                        <span class="font-semibold text-[#004B3B]">Debit Card</span>
                    </label>
                </div>
            </div>

            <!-- Card Details (hidden by default, shown when card payment is selected) -->
            <div id="cardDetails" class="bg-white rounded-lg shadow-lg p-8 border-l-4 border-[#50C878] hidden">
                <h2 class="text-2xl font-bold mb-6 text-[#004B3B]">Card Details</h2>

                <div class="mb-4">
                    <label class="block font-semibold text-[#004B3B] mb-2">Cardholder Name *</label>
                    <input type="text" name="card_name" class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="John Doe">
                </div>

                <div class="mb-4">
                    <label class="block font-semibold text-[#004B3B] mb-2">Card Number *</label>
                    <input type="text" name="card_number" class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="1234 5678 9012 3456" maxlength="19">
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block font-semibold text-[#004B3B] mb-2">Expiry Month *</label>
                        <input type="text" name="card_expiry_month" class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="MM" maxlength="2">
                    </div>
                    <div>
                        <label class="block font-semibold text-[#004B3B] mb-2">Expiry Year *</label>
                        <input type="text" name="card_expiry_year" class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="YY" maxlength="2">
                    </div>
                    <div>
                        <label class="block font-semibold text-[#004B3B] mb-2">CVV *</label>
                        <input type="text" name="card_cvv" class="w-full border-2 border-[#004B3B] rounded-lg px-4 py-2 focus:outline-none focus:border-[#50C878]" placeholder="123" maxlength="4">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-[#004B3B] to-[#0B3D2E] text-white py-4 rounded-lg font-bold hover:from-[#50C878] hover:to-[#50C878] hover:text-[#004B3B] transition text-lg">
                <i class="fas fa-check mr-2"></i>Place Order
            </button>
        </form>

        <script>
            const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
            const cardDetails = document.getElementById('cardDetails');

            paymentRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'cod') {
                        cardDetails.classList.add('hidden');
                        document.querySelectorAll('#cardDetails input').forEach(input => input.required = false);
                    } else {
                        cardDetails.classList.remove('hidden');
                        document.querySelectorAll('#cardDetails input').forEach(input => input.required = true);
                    }
                });
            });
        </script>
    </div>

    <!-- Order Summary -->
    <div>
        <div class="bg-gradient-to-br from-[#004B3B] to-[#0B3D2E] text-white rounded-lg p-8 sticky top-20 shadow-xl">
            <h2 class="text-2xl font-bold mb-8 text-[#50C878]">Order Summary</h2>

            <div class="space-y-3 mb-6 max-h-64 overflow-y-auto border-b border-gray-500 pb-6">
                @foreach($items as $item)
                    <div class="flex justify-between text-sm">
                        <span>{{ $item['product']->name }} x{{ $item['quantity'] }}</span>
                        <span class="font-semibold">AED {{ number_format($item['subtotal'], 2) }}</span>
                    </div>
                @endforeach
            </div>

            @php
                $tax = $total * 0.05;
                $grandTotal = $total + $tax;
            @endphp

            <div class="space-y-3 mb-6 border-b border-gray-500 pb-6">
                <div class="flex justify-between">
                    <span>Subtotal:</span>
                    <span class="font-bold">AED {{ number_format($total, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Shipping:</span>
                    <span class="font-bold text-[#50C878]">Free</span>
                </div>
                <div class="flex justify-between">
                    <span>Tax (5%):</span>
                    <span class="font-bold">AED {{ number_format($tax, 2) }}</span>
                </div>
            </div>

            <div class="flex justify-between text-2xl font-bold">
                <span>Total:</span>
                <span class="text-[#50C878]">AED {{ number_format($grandTotal, 2) }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
