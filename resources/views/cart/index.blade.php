@extends('app')

@section('title', 'Shopping Cart')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
    <!-- Cart Items -->
    <div class="col-span-1 md:col-span-2">
        <div class="mb-8">
            <h1 class="text-2xl md:text-4xl font-bold text-gray-800">Shopping Cart</h1>
            <p class="text-gray-600 mt-2">{{ count($items) }} {{ count($items) == 1 ? 'item' : 'items' }} in cart</p>
        </div>

        @if(count($items) > 0)
            <div class="space-y-4">
                @foreach($items as $item)
                    <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4 md:p-6 flex flex-col md:flex-row items-start md:items-center gap-4 md:gap-6 border-l-4 border-blue-600">
                        <!-- Product Image -->
                        <div class="bg-gray-100 w-20 h-20 md:w-24 md:h-24 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                            @if($item['product']->image)
                                <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-image text-gray-400 text-3xl"></i>
                            @endif
                        </div>

                        <!-- Product Details -->
                        <div class="flex-grow">
                            <h3 class="font-bold text-lg text-gray-800">{{ $item['product']->name }}</h3>
                            <p class="text-blue-600 font-semibold text-lg">AED {{ number_format($item['product']->price, 2) }}</p>
                        </div>

                        <!-- Quantity & Actions -->
                        <div class="flex items-center gap-6">
                            <form action="{{ route('cart.update', $item['product']->id) }}" method="POST" class="inline flex items-center gap-2 border border-gray-300 rounded-lg">
                                @csrf
                                @method('PATCH')
                                <button type="button" onclick="this.parentElement.querySelector('input').value = Math.max(1, parseInt(this.parentElement.querySelector('input').value) - 1); this.parentElement.submit();" class="px-3 py-2 text-gray-600 hover:bg-gray-100">−</button>
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="100" class="border-0 w-12 text-center font-semibold focus:outline-none" readonly>
                                <button type="button" onclick="this.parentElement.querySelector('input').value = parseInt(this.parentElement.querySelector('input').value) + 1; this.parentElement.submit();" class="px-3 py-2 text-gray-600 hover:bg-gray-100">+</button>
                            </form>

                            <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold flex items-center gap-2">
                                    <i class="fas fa-trash-alt"></i>Remove
                                </button>
                            </form>
                        </div>

                        <!-- Subtotal -->
                        <div class="text-right min-w-24">
                            <p class="text-2xl font-bold text-gray-900">AED {{ number_format($item['subtotal'], 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-gray-50 rounded-lg p-16 text-center border-2 border-dashed border-gray-300">
                <i class="fas fa-shopping-cart text-gray-400 text-6xl mb-4"></i>
                <p class="text-gray-600 text-xl font-semibold mb-2">Your cart is empty</p>
                <p class="text-gray-500 mb-8">Browse our products and add items to get started</p>
                <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 font-bold transition">
                    <i class="fas fa-arrow-left mr-2"></i>Continue Shopping
                </a>
            </div>
        @endif
    </div>

    <!-- Order Summary Sidebar -->
    @if(count($items) > 0)
        <div>
            <div class="bg-white rounded-lg shadow-lg p-8 sticky top-24">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2">
                    <i class="fas fa-receipt text-blue-600"></i>Order Summary
                </h2>

                @php
                    $subtotal = $total;
                    $shipping = 0;
                    $tax = $total * 0.05;
                    $grandTotal = $subtotal + $shipping + $tax;
                @endphp

                <div class="space-y-4 mb-6 pb-6 border-b border-gray-200">
                    <div class="flex justify-between text-gray-700">
                        <span>Subtotal:</span>
                        <span class="font-semibold">AED {{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Shipping:</span>
                        <span class="font-semibold text-green-600">FREE</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Tax (5%):</span>
                        <span class="font-semibold">AED {{ number_format($tax, 2) }}</span>
                    </div>
                </div>

                <div class="mb-8 pb-6 border-b border-gray-200">
                    <div class="flex justify-between text-2xl">
                        <span class="font-bold text-gray-800">Total:</span>
                        <span class="font-bold text-blue-600">AED {{ number_format($grandTotal, 2) }}</span>
                    </div>
                </div>

                <a href="{{ route('checkout.index') }}" class="block text-center w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition mb-4 text-lg flex items-center justify-center gap-2">
                    <i class="fas fa-lock"></i>Proceed to Checkout
                </a>
                <a href="{{ route('products.index') }}" class="block text-center text-blue-600 hover:text-blue-700 py-3 font-semibold transition">
                    <i class="fas fa-arrow-left mr-2"></i>Continue Shopping
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
</div>
@endsection
