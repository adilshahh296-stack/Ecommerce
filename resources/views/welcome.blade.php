@extends('app')

@section('title', 'Home')

@section('content')
<!-- Hero Search Section with Colored Background -->
<div class="bg-gradient-to-r from-purple-600 to-purple-500 py-6 mb-6">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center gap-2 mb-4">
            <i class="fas fa-bars text-white text-lg cursor-pointer"></i>
            <span class="text-white font-semibold">Category</span>
        </div>
        <div class="flex gap-3 items-center">
            <input type="text" placeholder="What are you looking for?" class="flex-1 px-6 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400 text-gray-700">
            <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 px-6 py-3 rounded-lg font-bold transition flex items-center gap-2">
                <i class="fas fa-search"></i>Search
            </button>
        </div>
        <div class="mt-3 flex items-center gap-2 text-white text-sm">
            <i class="fas fa-map-marker-alt"></i>
            <span>Deliver to</span>
            <span class="font-semibold">Fetching location...</span>
        </div>
    </div>
</div>

<!-- Category Carousel Section -->
<div class="mb-8 max-w-6xl mx-auto px-4">
    <div class="bg-purple-100 rounded-lg p-6 mb-4">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-gray-800">Featured Categories</h3>
            <a href="{{ route('products.index') }}" class="text-purple-600 font-semibold hover:underline">View All</a>
        </div>
        <!-- Category Carousel -->
        <div class="flex gap-4 overflow-x-auto pb-4 scroll-smooth">
            @php
                $categories = [
                    ['name' => 'Sale', 'icon' => '🔖', 'color' => 'bg-yellow-400'],
                    ['name' => 'iPhone', 'icon' => '📱', 'color' => 'bg-blue-400'],
                    ['name' => 'Mobiles & Tablets', 'icon' => '📲', 'color' => 'bg-indigo-400'],
                    ['name' => 'Laptops', 'icon' => '💻', 'color' => 'bg-green-400'],
                    ['name' => 'Gaming', 'icon' => '🎮', 'color' => 'bg-red-400'],
                    ['name' => 'Pre Owned', 'icon' => '🔄', 'color' => 'bg-orange-400'],
                    ['name' => 'Accessories', 'icon' => '🎧', 'color' => 'bg-pink-400'],
                    ['name' => 'Electronics', 'icon' => '⚡', 'color' => 'bg-cyan-400'],
                ];
            @endphp
            @foreach($categories as $cat)
                <div class="flex-shrink-0 w-28 text-center cursor-pointer group">
                    <div class="{{ $cat['color'] }} rounded-lg p-6 mb-2 group-hover:shadow-lg transition transform group-hover:scale-105">
                        <div class="text-4xl">{{ $cat['icon'] }}</div>
                    </div>
                    <p class="text-xs font-semibold text-gray-700 line-clamp-2">{{ $cat['name'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Carousel/Banner Section -->
<div class="relative mb-8 rounded-lg overflow-hidden shadow-lg max-w-6xl mx-auto px-4">
    <div class="carousel relative w-full h-48 md:h-80 bg-gray-200">
        <div class="carousel-slide active absolute inset-0">
            <div class="w-full h-full bg-gradient-to-r from-cyan-500 to-cyan-400 flex items-center justify-center p-4">
                <div class="text-center text-white">
                    <h1 class="text-2xl md:text-4xl font-bold mb-2">GRABIT Innovation</h1>
                    <p class="text-lg md:text-xl mb-4">Simplified Shopping Experience</p>
                    <div class="inline-block bg-yellow-400 text-gray-800 px-6 py-2 rounded font-bold mb-4">Coupon: GRAB10</div>
                    <br>
                    <a href="{{ route('products.index') }}" class="inline-block bg-yellow-400 text-gray-800 px-6 py-2 rounded-lg font-bold hover:bg-yellow-500 transition">SHOP NOW</a>
                </div>
            </div>
        </div>

        <div class="carousel-slide absolute inset-0">
            <div class="w-full h-full bg-gradient-to-r from-orange-500 to-orange-400 flex items-center justify-center p-4">
                <div class="text-center text-white">
                    <h2 class="text-2xl md:text-4xl font-bold mb-2">Get Extra Cashback</h2>
                    <p class="text-lg md:text-xl mb-4">Up to 3% on app this Ramadan</p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-white text-orange-600 px-6 py-2 rounded-lg font-bold hover:bg-gray-100 transition">DOWNLOAD APP</a>
                </div>
            </div>
        </div>

        <div class="carousel-slide absolute inset-0">
            <div class="w-full h-full bg-gradient-to-r from-purple-600 to-purple-500 flex items-center justify-center p-4">
                <div class="text-center text-white">
                    <h2 class="text-2xl md:text-4xl font-bold mb-2">Limited Offers</h2>
                    <p class="text-lg md:text-xl mb-4">Best Deals on Premium Products</p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-white text-purple-600 px-6 py-2 rounded-lg font-bold hover:bg-gray-100 transition">EXPLORE DEALS</a>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button onclick="carouselPrev()" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full w-10 h-10 flex items-center justify-center transition z-10">
            <i class="fas fa-chevron-left text-gray-800"></i>
        </button>
        <button onclick="carouselNext()" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full w-10 h-10 flex items-center justify-center transition z-10">
            <i class="fas fa-chevron-right text-gray-800"></i>
        </button>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2 z-10">
            <button onclick="currentSlide(0)" class="w-3 h-3 rounded-full bg-white bg-opacity-80 hover:bg-opacity-100 transition"></button>
            <button onclick="currentSlide(1)" class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-80 transition"></button>
            <button onclick="currentSlide(2)" class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-80 transition"></button>
        </div>
    </div>
</div>

<!-- Deals You Might Like Section -->
<div class="mb-8 max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Deals You Might Like</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @php
            $deals = [
                ['name' => 'Skin Care', 'color' => 'bg-pink-100', 'icon' => '✨'],
                ['name' => 'Home & Furnishing', 'color' => 'bg-blue-100', 'icon' => '🏠'],
                ['name' => 'Sports & Fitness', 'color' => 'bg-green-100', 'icon' => '⚽'],
                ['name' => 'Gaming Accessories', 'color' => 'bg-purple-100', 'icon' => '🎮'],
            ];
        @endphp
        @foreach($deals as $deal)
            <a href="{{ route('products.index') }}" class="{{ $deal['color'] }} rounded-lg p-6 text-center hover:shadow-lg transition cursor-pointer transform hover:scale-105">
                <div class="text-4xl mb-2">{{ $deal['icon'] }}</div>
                <p class="font-semibold text-gray-800 text-sm">{{ $deal['name'] }}</p>
            </a>
        @endforeach
    </div>
</div>

<!-- Limited Time Deals Section -->
<div class="mb-8 max-w-6xl mx-auto px-4 bg-white rounded-lg shadow-lg p-6">
    <div class="flex items-center gap-3 mb-6">
        <span class="text-2xl">⏰</span>
        <h2 class="text-2xl font-bold text-gray-800">Limited Time Deals</h2>
    </div>
    
    <div class="flex gap-4 overflow-x-auto pb-4">
        @php
            $timedDeals = [
                ['name' => 'Earphones', 'icon' => '🎧'],
                ['name' => 'Watches', 'icon' => '⌚'],
                ['name' => 'Perfumes', 'icon' => '💐'],
                ['name' => 'iPhones', 'icon' => '📱'],
            ];
        @endphp
        @foreach($timedDeals as $deal)
            <a href="{{ route('products.index') }}" class="flex-shrink-0 w-40 bg-gradient-to-b from-blue-100 to-blue-50 rounded-lg p-4 text-center hover:shadow-lg transition transform hover:scale-105">
                <div class="text-5xl mb-3">{{ $deal['icon'] }}</div>
                <p class="font-semibold text-gray-800 text-sm">{{ $deal['name'] }}</p>
            </a>
        @endforeach
    </div>
</div>

<!-- Trending Deals Section -->
<div class="mb-8 max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Trending Deals</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('products.index') }}" class="bg-gradient-to-br from-yellow-400 to-yellow-300 rounded-lg p-6 text-white h-40 relative overflow-hidden cursor-pointer hover:shadow-lg transition group">
            <div class="absolute right-0 top-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16 group-hover:scale-110 transition"></div>
            <h3 class="text-2xl font-bold mb-2 relative z-10">Premium Watches</h3>
            <p class="text-sm opacity-90 relative z-10">Latest Collections</p>
        </a>
        <a href="{{ route('products.index') }}" class="bg-gradient-to-br from-purple-400 to-purple-300 rounded-lg p-6 text-white h-40 relative overflow-hidden cursor-pointer hover:shadow-lg transition group">
            <div class="absolute right-0 top-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16 group-hover:scale-110 transition"></div>
            <h3 class="text-2xl font-bold mb-2 relative z-10">Beauty & Care</h3>
            <p class="text-sm opacity-90 relative z-10">Premium Products</p>
        </a>
        <a href="{{ route('products.index') }}" class="bg-gradient-to-br from-blue-400 to-blue-300 rounded-lg p-6 text-white h-40 relative overflow-hidden cursor-pointer hover:shadow-lg transition group">
            <div class="absolute right-0 top-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16 group-hover:scale-110 transition"></div>
            <h3 class="text-2xl font-bold mb-2 relative z-10">Electronics</h3>
            <p class="text-sm opacity-90 relative z-10">Latest Tech Gadgets</p>
        </a>
    </div>
</div>

<!-- Featured Products Section -->
<div class="mb-12 max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
        <span>⭐</span>Top Picks For You
    </h2>
    @php
        $products = \App\Models\Product::where('is_active', 1)->limit(8)->get();
    @endphp
    @if($products->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($products as $product)
                <a href="{{ route('products.show', $product) }}" class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden group">
                    <!-- Image -->
                    <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @if($product->original_price && $product->original_price > $product->price)
                            <div class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded font-bold text-sm">
                                {{ round((1 - $product->price / $product->original_price) * 100) }}% OFF
                            </div>
                        @endif
                    </div>
                    <!-- Content -->
                    <div class="p-3">
                        <h3 class="font-semibold text-sm text-gray-800 line-clamp-2 mb-2">{{ $product->name }}</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex">
                                @for($i = 0; $i < 5; $i++)
                                    @if($i < round($product->average_rating ?? 0))
                                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    @else
                                        <i class="far fa-star text-gray-300 text-xs"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-xs text-gray-600">({{ $product->reviews_count ?? 0 }})</span>
                        </div>
                        <div class="mb-3">
                            <span class="text-lg font-bold text-gray-900">AED {{ number_format($product->price, 0) }}</span>
                            @if($product->original_price)
                                <span class="text-xs text-gray-500 line-through ml-1">AED {{ number_format($product->original_price, 0) }}</span>
                            @endif
                        </div>
                        <button type="button" onclick="event.preventDefault(); addToCart({{ $product->id }})" class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition text-xs">
                            Add to Cart
                        </button>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="text-center py-12 bg-gray-50 rounded-lg">
            <p class="text-gray-600 text-lg">No products yet. Check back soon!</p>
            <a href="{{ route('products.index') }}" class="inline-block mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Browse Products
            </a>
        </div>
    @endif
</div>

<style>
    .carousel-slide { display: none; }
    .carousel-slide.active { display: block; }
    .scroll-smooth { scroll-behavior: smooth; }
</style>

@endsection

<script>
let currentSlideIndex = 0;

function showSlide(n) {
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel button[onclick^="currentSlide"]');
    
    if (n >= slides.length) currentSlideIndex = 0;
    if (n < 0) currentSlideIndex = slides.length - 1;
    
    slides.forEach(slide => slide.classList.remove('active'));
    if (slides[currentSlideIndex]) slides[currentSlideIndex].classList.add('active');
}

function carouselNext() {
    currentSlideIndex++;
    showSlide(currentSlideIndex);
}

function carouselPrev() {
    currentSlideIndex--;
    showSlide(currentSlideIndex);
}

function currentSlide(n) {
    currentSlideIndex = n;
    showSlide(currentSlideIndex);
}

// Auto rotate every 5 seconds
setInterval(carouselNext, 5000);

// Initialize
showSlide(currentSlideIndex);

function addToCart(productId) {
    fetch(`/cart/add/${productId}`, { 
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message || 'Added to cart!');
        location.reload();
    })
    .catch(error => console.error('Error:', error));
}
</script>
