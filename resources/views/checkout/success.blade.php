@extends('app')

@section('title', 'Order Confirmation')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Success Message -->
    <div class="bg-gradient-to-br from-[#50C878] to-[#004B3B] text-white rounded-lg p-12 text-center mb-8 shadow-xl">
        <i class="fas fa-check-circle text-6xl mb-4"></i>
        <h1 class="text-4xl font-bold mb-2">Order Confirmed!</h1>
        <p class="text-lg opacity-90">Thank you for your purchase. Your order has been successfully placed.</p>
    </div>

    <!-- Order Details -->
    <div class="bg-white rounded-lg shadow-lg p-8 border-l-4 border-[#50C878] mb-8">
        <h2 class="text-2xl font-bold mb-6 text-[#004B3B]">Order Details</h2>

        <div class="grid grid-cols-2 gap-6 mb-6 pb-6 border-b-2 border-gray-200">
            <div>
                <p class="text-gray-600 text-sm font-semibold mb-1">ORDER NUMBER</p>
                <p class="text-xl font-bold text-[#004B3B]">{{ $order->order_number }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm font-semibold mb-1">ORDER DATE</p>
                <p class="text-xl font-bold text-[#004B3B]">{{ $order->created_at->format('M d, Y') }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm font-semibold mb-1">STATUS</p>
                <p class="text-xl font-bold text-[#50C878]">{{ ucfirst($order->status) }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm font-semibold mb-1">TOTAL AMOUNT</p>
                <p class="text-xl font-bold text-[#004B3B]">AED {{ number_format($order->total_amount, 2) }}</p>
            </div>
        </div>

        <h3 class="text-lg font-bold mb-4 text-[#004B3B]">Payment Method</h3>
        <div class="mb-6 p-4 bg-gray-50 rounded-lg border-l-4 border-[#50C878]">
            <p class="text-[#004B3B] font-semibold text-lg">
                @if($order->payment_method === 'cod')
                    <i class="fas fa-money-bill-wave text-[#50C878] mr-2"></i>Cash on Delivery (COD)
                @elseif($order->payment_method === 'visa')
                    <i class="fas fa-cc-visa text-blue-600 mr-2"></i>Visa Card
                @elseif($order->payment_method === 'mastercard')
                    <i class="fas fa-cc-mastercard text-red-600 mr-2"></i>Mastercard
                @elseif($order->payment_method === 'credit')
                    <i class="fas fa-credit-card text-purple-600 mr-2"></i>Credit Card
                @elseif($order->payment_method === 'debit')
                    <i class="fas fa-credit-card text-green-600 mr-2"></i>Debit Card
                @endif
            </p>
        </div>

        <h3 class="text-lg font-bold mb-4 text-[#004B3B]">Customer Information</h3>
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-gray-600 text-sm">Name</p>
                <p class="font-semibold text-[#004B3B]">{{ $order->customer_name }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Email</p>
                <p class="font-semibold text-[#004B3B]">{{ $order->customer_email }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Phone</p>
                <p class="font-semibold text-[#004B3B]">{{ $order->customer_phone }}</p>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Shipping Address</p>
                <p class="font-semibold text-[#004B3B]">{{ $order->shipping_address }}</p>
            </div>
        </div>
    </div>

    <!-- Order Items -->
    <div class="bg-white rounded-lg shadow-lg p-8 border-l-4 border-[#50C878] mb-8">
        <h2 class="text-2xl font-bold mb-6 text-[#004B3B]">Order Items</h2>

        <div class="space-y-4">
            @foreach($items as $item)
                <div class="flex items-center gap-6 p-4 bg-gray-50 rounded-lg">
                    <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                        @if($item->product->image)
                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-gem text-[#004B3B] text-3xl opacity-30"></i>
                        @endif
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg text-[#004B3B]">{{ $item->product->name }}</h3>
                        <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                        <p class="text-[#50C878] font-semibold">AED {{ number_format($item->unit_price, 2) }} each</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-[#004B3B]">AED {{ number_format($item->total_price, 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Next Steps -->
    <div class="bg-blue-50 border-l-4 border-blue-400 p-6 rounded-lg mb-8">
        <h3 class="font-bold text-lg text-blue-900 mb-2">What happens next?</h3>
        <ul class="text-blue-800 space-y-2">
            <li><i class="fas fa-check-circle text-[#50C878] mr-2"></i>You will receive a confirmation email shortly</li>
            <li><i class="fas fa-check-circle text-[#50C878] mr-2"></i>Our team will prepare your order for shipment</li>
            <li><i class="fas fa-check-circle text-[#50C878] mr-2"></i>You can track your order using your order number</li>
        </ul>
    </div>

    <!-- Action Buttons -->
    <div class="flex gap-4">
        <a href="{{ route('products.index') }}" class="flex-1 text-center bg-gradient-to-r from-[#004B3B] to-[#0B3D2E] text-white py-4 rounded-lg font-bold hover:from-[#50C878] hover:to-[#50C878] hover:text-[#004B3B] transition">
            <i class="fas fa-shopping-bag mr-2"></i>Continue Shopping
        </a>
        <a href="{{ route('home') }}" class="flex-1 text-center border-2 border-[#004B3B] text-[#004B3B] py-4 rounded-lg font-bold hover:bg-[#004B3B] hover:text-white transition">
            <i class="fas fa-home mr-2"></i>Back to Home
        </a>
    </div>
</div>
@endsection
