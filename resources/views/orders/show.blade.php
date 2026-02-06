@extends('app')

@section('title', 'Order #' . $order->order_number)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <a href="{{ route('profile.show') }}" class="text-[#50C878] hover:text-[#004B3B] mb-4 inline-block">← Back to Orders</a>
        
        <h1 class="text-3xl font-bold text-[#004B3B] mb-2">Order #{{ $order->order_number }}</h1>
        <p class="text-gray-600 mb-6">{{ $order->created_at->format('M d, Y H:i') }}</p>

        <div class="grid grid-cols-2 gap-8 mb-8">
            <div>
                <h2 class="text-lg font-bold text-[#004B3B] mb-4">Delivery To</h2>
                <p class="font-semibold text-gray-900">{{ $order->customer_name }}</p>
                <p class="text-gray-600">{{ $order->shipping_address }}</p>
                <p class="text-gray-600">{{ $order->city }}, {{ $order->postal_code }}</p>
                <p class="text-gray-600 mt-2">{{ $order->customer_phone }}</p>
            </div>

            <div>
                <h2 class="text-lg font-bold text-[#004B3B] mb-4">Order Status</h2>
                <span class="px-4 py-2 rounded-full font-bold text-white text-lg {{ match($order->status) {
                    'pending' => 'bg-yellow-500',
                    'confirmed' => 'bg-blue-500',
                    'processing' => 'bg-purple-500',
                    'shipped' => 'bg-orange-500',
                    'completed' => 'bg-green-500',
                    'cancelled' => 'bg-red-500',
                    default => 'bg-gray-500'
                } }}">
                    {{ ucfirst($order->status) }}
                </span>
                @if ($order->payment_method)
                    <p class="text-gray-600 mt-4">Payment: {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                @endif
            </div>
        </div>

        <!-- Items -->
        <h2 class="text-lg font-bold text-[#004B3B] mb-4">Order Items</h2>
        <div class="overflow-x-auto mb-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($order->items as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->product_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">AED {{ number_format($item->price, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $item->quantity }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-[#004B3B]">AED {{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div class="flex justify-end mb-8">
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex justify-between mb-2 text-gray-600">
                    <span>Subtotal:</span>
                    <span>AED {{ number_format($order->total ?? 0, 2) }}</span>
                </div>
                <div class="flex justify-between mb-4 pb-4 border-b text-gray-600">
                    <span>Tax (5%):</span>
                    <span>AED {{ number_format(($order->total ?? 0) * 0.05, 2) }}</span>
                </div>
                <div class="flex justify-between text-xl font-bold">
                    <span class="text-[#004B3B]">Total:</span>
                    <span class="text-[#50C878]">AED {{ number_format($order->total_amount ?? 0, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Timeline -->
        <h2 class="text-lg font-bold text-[#004B3B] mb-6">Order Progress</h2>
        <div class="space-y-4">
            @php
                $states = [
                    'pending' => ['Pending', 'Order Received', $order->created_at],
                    'confirmed' => ['Confirmed', 'Order Confirmed', $order->confirmed_at],
                    'processing' => ['Processing', 'Being Prepared', $order->processing_at],
                    'shipped' => ['Shipped', 'On the Way', $order->shipped_at],
                    'completed' => ['Delivered', 'Successfully Delivered', $order->delivered_at],
                ];
            @endphp

            @foreach ($states as $state => $details)
                @php
                    $isCompleted = $details[2] !== null;
                    $nextInOrder = [];
                    $stateKeys = array_keys($states);
                    $currentIndex = array_search($state, $stateKeys);
                    if ($currentIndex < count($stateKeys) - 1) {
                        $nextState = $stateKeys[$currentIndex + 1];
                        $nextInOrder = [$nextState => $states[$nextState]];
                    }
                @endphp
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full {{ $isCompleted ? 'bg-[#50C878]' : 'bg-gray-300' }} flex items-center justify-center text-white font-bold">
                            @if ($isCompleted) ✓ @else - @endif
                        </div>
                        @if ($state !== 'completed')
                            <div class="w-1 h-16 {{ $isCompleted && next($stateKeys = array_keys($states)) ? 'bg-[#50C878]' : 'bg-gray-300' }}"></div>
                        @endif
                    </div>
                    <div class="pb-4">
                        <h3 class="font-bold text-[#004B3B] text-lg">{{ $details[0] }}</h3>
                        <p class="text-gray-600 text-sm">{{ $details[1] }}</p>
                        @if ($details[2])
                            <p class="text-gray-500 text-xs mt-1">{{ $details[2]->format('M d, Y H:i') }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
