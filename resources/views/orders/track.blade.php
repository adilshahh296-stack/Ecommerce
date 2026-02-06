@extends('app')

@section('title', 'Track Order')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Search Form -->
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
        <h1 class="text-3xl font-bold text-[#004B3B] mb-6">Track Your Order</h1>
        <form action="{{ route('orders.track') }}" method="GET" class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="order_number" class="block text-sm font-medium text-gray-700 mb-2">Order Number</label>
                    <input type="text" id="order_number" name="order_number" value="{{ request('order_number') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#50C878]" placeholder="e.g., ORD-2024-001">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ request('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#50C878]" placeholder="your@email.com">
                </div>
            </div>
            <button type="submit" class="w-full bg-[#50C878] text-[#004B3B] py-3 rounded-lg font-bold hover:bg-[#004B3B] hover:text-white transition">Track Order</button>
        </form>
    </div>

    <!-- Order Details -->
    @if ($order)
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <div class="grid grid-cols-2 gap-8 mb-8">
                <div>
                    <h2 class="text-lg font-bold text-[#004B3B] mb-4">Order Information</h2>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Order Number</dt>
                            <dd class="text-lg font-semibold text-[#004B3B]">{{ $order->order_number }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Order Date</dt>
                            <dd class="text-lg text-gray-900">{{ $order->created_at->format('M d, Y H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="text-lg">
                                <span class="px-3 py-1 rounded-full font-semibold text-white {{ match($order->status) {
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
                            </dd>
                        </div>
                    </dl>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-[#004B3B] mb-4">Delivery Information</h2>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Recipient</dt>
                            <dd class="text-lg font-semibold text-gray-900">{{ $order->customer_name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Address</dt>
                            <dd class="text-lg text-gray-900">{{ $order->shipping_address }}, {{ $order->city }}, {{ $order->postal_code }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Phone</dt>
                            <dd class="text-lg text-gray-900">{{ $order->customer_phone }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Order Items -->
            <h2 class="text-lg font-bold text-[#004B3B] mb-4">Order Items</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
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

            <!-- Order Total -->
            <div class="flex justify-end mt-6">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600">Subtotal:</span>
                        <span class="text-lg text-gray-900">AED {{ number_format($order->total ?? 0, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-4 pb-4 border-b">
                        <span class="text-gray-600">Tax (5%):</span>
                        <span class="text-lg text-gray-900">AED {{ number_format(($order->total ?? 0) * 0.05, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-[#004B3B]">Total:</span>
                        <span class="text-2xl font-bold text-[#50C878]">AED {{ number_format($order->total_amount ?? 0, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Timeline -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-lg font-bold text-[#004B3B] mb-6">Order Timeline</h2>
            <div class="space-y-6">
                @php
                    $statusMap = [
                        'pending' => ['Pending', 'Order Received'],
                        'confirmed' => ['Confirmed', 'Order Confirmed'],
                        'processing' => ['Processing', 'Being Prepared'],
                        'shipped' => ['Shipped', 'On the Way'],
                        'completed' => ['Delivered', 'Successfully Delivered'],
                    ];
                @endphp

                @foreach ($statusMap as $status => $labels)
                    @php
                        $isCompleted = false;
                        if ($status === 'pending') $isCompleted = true;
                        elseif ($status === 'confirmed') $isCompleted = $order->confirmed_at !== null;
                        elseif ($status === 'processing') $isCompleted = $order->processing_at !== null;
                        elseif ($status === 'shipped') $isCompleted = $order->shipped_at !== null;
                        elseif ($status === 'completed') $isCompleted = $order->delivered_at !== null;

                        $date = match($status) {
                            'pending' => $order->created_at,
                            'confirmed' => $order->confirmed_at,
                            'processing' => $order->processing_at,
                            'shipped' => $order->shipped_at,
                            'completed' => $order->delivered_at,
                            default => null
                        };
                    @endphp
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full {{ $isCompleted ? 'bg-[#50C878]' : 'bg-gray-300' }} flex items-center justify-center text-white">
                                @if ($isCompleted)
                                    ✓
                                @else
                                    -
                                @endif
                            </div>
                            @if ($status !== 'completed')
                                <div class="w-1 h-12 {{ $isCompleted ? 'bg-[#50C878]' : 'bg-gray-300' }}"></div>
                            @endif
                        </div>
                        <div class="pb-6">
                            <h3 class="font-semibold text-[#004B3B]">{{ $labels[0] }}</h3>
                            <p class="text-gray-600 text-sm">{{ $labels[1] }}</p>
                            @if ($date)
                                <p class="text-gray-500 text-xs mt-1">{{ $date->format('M d, Y H:i') }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @elseif (request()->has('order_number'))
        <div class="bg-red-50 border border-red-200 rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold text-red-700 mb-2">Order Not Found</h2>
            <p class="text-gray-600">No order found with the provided order number and email address.</p>
        </div>
    @endif
</div>
@endsection
