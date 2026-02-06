@extends('app')

@section('title', 'Home')

@section('content')
<!-- Carousel/Banner Section -->
<div class="relative mb-8 rounded-lg overflow-hidden shadow-lg">
    <div class="carousel relative w-full h-48 md:h-96 bg-gray-200">
        <div class="carousel-slide active absolute inset-0">
            <div class="w-full h-full bg-gradient-to-r from-blue-600 to-blue-400 flex items-center justify-center p-4 md:p-0">
                <div class="text-center text-white">
                    <h1 class="text-2xl md:text-5xl font-bold mb-2 md:mb-4">Welcome to BRIGHT MAX</h1>
                    <p class="text-lg md:text-2xl mb-4 md:mb-8">Premium Products at Best Prices</p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-white text-blue-600 px-4 md:px-8 py-2 md:py-3 rounded-lg font-bold hover:bg-gray-100 transition text-sm md:text-lg">
                        SHOP NOW
                    </a>
                </div>
            </div>
        </div>
        <div class="carousel-slide absolute inset-0">
            <div class="w-full h-full bg-gradient-to-r from-purple-600 to-pink-400 flex items-center justify-center p-4 md:p-0">
                <div class="text-center text-white">
                    <h2 class="text-2xl md:text-5xl font-bold mb-2 md:mb-4">Flash Sale</h2>
                    <p class="text-lg md:text-2xl mb-4 md:mb-8">Up to 50% OFF on Selected Items</p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-white text-purple-600 px-4 md:px-8 py-2 md:py-3 rounded-lg font-bold hover:bg-gray-100 transition text-sm md:text-lg">
                        EXPLORE DEALS
                    </a>
                </div>
            </div>
        </div>
        <div class="carousel-slide absolute inset-0">
            <div class="w-full h-full bg-gradient-to-r from-green-600 to-teal-400 flex items-center justify-center p-4 md:p-0">
                <div class="text-center text-white">
                    <h2 class="text-2xl md:text-5xl font-bold mb-2 md:mb-4">New Arrivals</h2>
                    <p class="text-lg md:text-2xl mb-4 md:mb-8">Check Out Latest Products</p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-white text-green-600 px-4 md:px-8 py-2 md:py-3 rounded-lg font-bold hover:bg-gray-100 transition text-sm md:text-lg">
                        VIEW COLLECTION
                    </a>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button onclick="carouselPrev()" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full w-12 h-12 flex items-center justify-center transition z-10">
            <i class="fas fa-chevron-left text-gray-800"></i>
        </button>
        <button onclick="carouselNext()" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full w-12 h-12 flex items-center justify-center transition z-10">
            <i class="fas fa-chevron-right text-gray-800"></i>
        </button>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2 z-10">
            <button onclick="currentSlide(0)" class="w-3 h-3 rounded-full bg-white bg-opacity-80 hover:bg-opacity-100 transition"></button>
            <button onclick="currentSlide(1)" class="w-3 h-3 rounded-full bg-white bg-opacity-80 hover:bg-opacity-100 transition"></button>
            <button onclick="currentSlide(2)" class="w-3 h-3 rounded-full bg-white bg-opacity-80 hover:bg-opacity-100 transition"></button>
        </div>
    </div>
</div>

<!-- Category Cards -->
<div class="mb-12">
    <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2 md:gap-4">
        <div class="category-card bg-white rounded-lg shadow hover:shadow-lg text-center p-6 cursor-pointer">
            <div class="text-5xl mb-3">🎮</div>
            <p class="font-semibold text-gray-700">Electronics</p>
        </div>
        <div class="category-card bg-white rounded-lg shadow hover:shadow-lg text-center p-6 cursor-pointer">
            <div class="text-5xl mb-3">👗</div>
            <p class="font-semibold text-gray-700">Fashion</p>
        </div>
        <div class="category-card bg-white rounded-lg shadow hover:shadow-lg text-center p-6 cursor-pointer">
            <div class="text-5xl mb-3">🏠</div>
            <p class="font-semibold text-gray-700">Home</p>
        </div>
        <div class="category-card bg-white rounded-lg shadow hover:shadow-lg text-center p-6 cursor-pointer">
            <div class="text-5xl mb-3">⚽</div>
            <p class="font-semibold text-gray-700">Sports</p>
        </div>
        <div class="category-card bg-white rounded-lg shadow hover:shadow-lg text-center p-6 cursor-pointer">
            <div class="text-5xl mb-3">💄</div>
            <p class="font-semibold text-gray-700">Beauty</p>
        </div>
        <div class="category-card bg-white rounded-lg shadow hover:shadow-lg text-center p-6 cursor-pointer">
            <div class="text-5xl mb-3">📚</div>
            <p class="font-semibold text-gray-700">Books</p>
        </div>
    </div>
</div>

<!-- Special Deals Banner -->
<div class="mb-12 bg-gradient-to-r from-red-500 to-red-400 rounded-lg p-4 md:p-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl md:text-4xl font-bold mb-2">⚡ Flash Sale</h2>
            <p class="text-lg md:text-xl opacity-90">Limited Time Offers - Shop Now!</p>
        </div>
        <a href="{{ route('products.index') }}" class="bg-white text-red-500 px-4 md:px-8 py-2 md:py-3 rounded-lg font-bold hover:bg-gray-100 transition text-sm md:text-base">
            BROWSE DEALS
        </a>
    </div>
</div>

<!-- TOP PICKS SECTION - Like Shopee -->
<div class="mb-12">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
        <i class="fas fa-star text-yellow-400"></i>Top Picks For You
    </h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 md:gap-4">
        @php
            $topProducts = $products->take(5);
        @endphp
        @forelse($topProducts as $product)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group relative">
                <!-- Wishlist Button -->
                <button class="absolute top-3 right-3 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:bg-red-50 transition z-10" onclick="toggleWishlist(this)">
                    <i class="far fa-heart text-gray-600 text-lg"></i>
                </button>

                <!-- Discount Badge -->
                @if($product->original_price && $product->original_price > $product->price)
                    <div class="absolute top-3 left-3 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-md">
                        -{{ round((1 - $product->price / $product->original_price) * 100) }}%
                    </div>
                @endif

                <!-- Image -->
                <div class="bg-gray-100 h-56 flex items-center justify-center overflow-hidden">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                </div>

                <!-- Content -->
                <div class="p-4">
                    <h3 class="font-semibold text-sm text-gray-800 line-clamp-2 mb-2">{{ $product->name }}</h3>
                    
                    <!-- Rating -->
                    <div class="flex items-center gap-1 mb-2">
                        <div class="flex star-rating text-xs">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < round($product->average_rating ?? 0))
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star text-gray-300"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-xs text-gray-600">({{ $product->reviews_count ?? 0 }})</span>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <div class="flex items-baseline gap-2">
                            <span class="text-xl font-bold text-gray-900">AED {{ number_format($product->price, 0) }}</span>
                            @if($product->original_price)
                                <span class="text-xs text-gray-500 line-through">AED {{ number_format($product->original_price, 0) }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Button -->
                    <button type="button" onclick="addToCart({{ $product->id }})" class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition text-sm">
                        Add to Cart
                    </button>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>

<!-- BEST SELLERS CAROUSEL -->
<div class="mb-12 bg-purple-50 rounded-lg p-4 md:p-8">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
        <i class="fas fa-fire text-orange-500"></i>Best Sellers This Week
    </h2>
    <div class="relative">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 md:gap-4" id="bestsellersCarousel">
            @php
                $bestSellers = $products->shuffle()->take(10);
            @endphp
            @forelse($bestSellers as $index => $product)
                <div class="best-seller-card bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group relative {{ $index >= 5 ? 'hidden' : '' }}">
                    <!-- Sold Badge -->
                    <div class="absolute top-3 left-3 bg-green-500 text-white px-2 py-1 rounded text-xs font-bold shadow-md">
                        🔥 Hot
                    </div>

                    <!-- Wishlist Button -->
                    <button class="absolute top-3 right-3 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:bg-red-50 transition" onclick="toggleWishlist(this)">
                        <i class="far fa-heart text-gray-600 text-lg"></i>
                    </button>

                    <!-- Image -->
                    <div class="bg-gray-100 h-52 flex items-center justify-center overflow-hidden">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>

                    <!-- Content -->
                    <div class="p-3">
                        <h3 class="font-semibold text-xs text-gray-800 line-clamp-2 mb-1">{{ $product->name }}</h3>
                        
                        <!-- Rating -->
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex star-rating text-xs">
                                @for($i = 0; $i < 5; $i++)
                                    @if($i < round($product->average_rating ?? 0))
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star text-gray-300"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-xs text-gray-600">({{ $product->reviews_count ?? 0 }})</span>
                        </div>

                        <!-- Price -->
                        <div class="mb-2">
                            <span class="font-bold text-gray-900">AED {{ number_format($product->price, 0) }}</span>
                        </div>

                        <!-- Button -->
                        <button type="button" onclick="addToCart({{ $product->id }})" class="w-full bg-blue-600 text-white py-1 rounded text-xs font-semibold hover:bg-blue-700 transition">
                            Add
                        </button>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

        <!-- Carousel Controls -->
        <button onclick="scrollBestsellers(-1)" class="absolute -left-5 top-1/2 transform -translate-y-1/2 bg-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:bg-gray-100 transition z-10">
            <i class="fas fa-chevron-left text-gray-800"></i>
        </button>
        <button onclick="scrollBestsellers(1)" class="absolute -right-5 top-1/2 transform -translate-y-1/2 bg-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:bg-gray-100 transition z-10">
            <i class="fas fa-chevron-right text-gray-800"></i>
        </button>
    </div>
</div>

<!-- Featured Products Section -->
<div class="mb-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">🔥 Featured Products</h2>
            <p class="text-gray-600">Popular items our customers love</p>
        </div>
        <a href="{{ route('products.index') }}" class="text-blue-600 font-semibold hover:text-blue-700 flex items-center gap-2">
            View All <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 md:gap-4">
        @forelse($products as $product)
            <a href="{{ route('products.show', $product) }}" class="bg-white rounded-lg shadow hover:shadow-2xl transition overflow-hidden group">
                <!-- Image -->
                <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden relative">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    @if($product->original_price && $product->original_price > $product->price)
                        <div class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                            -{{ round((1 - $product->price / $product->original_price) * 100) }}%
                        </div>
                    @endif
                </div>

                <!-- Content -->
                <div class="p-4">
                    <h3 class="font-semibold text-sm text-gray-800 line-clamp-2 mb-2">{{ $product->name }}</h3>
                    
                    <!-- Rating -->
                    <div class="flex items-center gap-1 mb-3">
                        <div class="flex star-rating">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < round($product->average_rating ?? 0))
                                    <i class="fas fa-star text-sm"></i>
                                @else
                                    <i class="far fa-star text-sm text-gray-300"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-xs text-gray-600">({{ $product->reviews_count ?? 0 }})</span>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <div class="flex items-baseline gap-2">
                            <span class="text-lg font-bold text-gray-900">AED {{ number_format($product->price, 0) }}</span>
                            @if($product->original_price)
                                <span class="text-sm text-gray-500 line-through">AED {{ number_format($product->original_price, 0) }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Quick Add to Cart -->
                    <button type="button" onclick="addToCart({{ $product->id }})" class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition text-sm">
                        Add to Cart
                    </button>
                </div>
            </a>
        @empty
            <div class="col-span-5 text-center py-12">
                <p class="text-gray-600 text-lg">No products available</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Trending & Best Sellers Section -->
<div class="grid grid-cols-2 gap-8 mb-12">
    <!-- Trending Deals -->
    <div class="bg-gradient-to-br from-yellow-400 to-orange-400 rounded-lg p-8 text-white shadow-lg">
        <h3 class="text-2xl font-bold mb-3">🔥 Trending Deals</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="font-semibold">Hot Items</span>
                <span class="bg-red-500 px-3 py-1 rounded-full text-sm font-bold">SALE</span>
            </div>
            <p class="text-sm opacity-90">Limited stock available</p>
            <a href="{{ route('products.index') }}" class="inline-block mt-4 bg-white text-orange-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition">
                Shop Trending
            </a>
        </div>
    </div>

    <!-- Best Sellers -->
    <div class="bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg p-8 text-white shadow-lg">
        <h3 class="text-2xl font-bold mb-3">⭐ Best Sellers</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="font-semibold">Most Loved</span>
                <span class="bg-blue-600 px-3 py-1 rounded-full text-sm font-bold">TOP</span>
            </div>
            <p class="text-sm opacity-90">Highly rated by customers</p>
            <a href="{{ route('products.index') }}?sort=rating" class="inline-block mt-4 bg-white text-purple-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition">
                View Best Sellers
            </a>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8 bg-gray-50 p-4 md:p-8 rounded-lg mb-12">
    <div class="text-center">
        <div class="text-4xl text-blue-600 mb-4">
            <i class="fas fa-shield-alt"></i>
        </div>
        <h3 class="font-bold text-lg mb-2 text-gray-800">Secure Checkout</h3>
        <p class="text-gray-600">100% secure and encrypted transactions</p>
    </div>
    <div class="text-center">
        <div class="text-4xl text-blue-600 mb-4">
            <i class="fas fa-truck"></i>
        </div>
        <h3 class="font-bold text-lg mb-2 text-gray-800">Fast Shipping</h3>
        <p class="text-gray-600">Quick delivery across the region</p>
    </div>
    <div class="text-center">
        <div class="text-4xl text-blue-600 mb-4">
            <i class="fas fa-headset"></i>
        </div>
        <h3 class="font-bold text-lg mb-2 text-gray-800">24/7 Support</h3>
        <p class="text-gray-600">Always here to help with WhatsApp</p>
    </div>
</div>

<script>
let currentSlideIndex = 0;

function carouselNext() {
    currentSlideIndex = (currentSlideIndex + 1) % 3;
    showSlide();
}

function carouselPrev() {
    currentSlideIndex = (currentSlideIndex - 1 + 3) % 3;
    showSlide();
}

function currentSlide(n) {
    currentSlideIndex = n;
    showSlide();
}

function showSlide() {
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel button[onclick^="currentSlide"]');
    
    slides.forEach((slide, index) => {
        slide.classList.toggle('active', index === currentSlideIndex);
    });
    
    if (indicators.length > 0) {
        indicators.forEach((btn, index) => {
            btn.className = index === currentSlideIndex 
                ? 'w-3 h-3 rounded-full bg-white transition' 
                : 'w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-80 transition';
        });
    }
}

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

function toggleWishlist(button) {
    const icon = button.querySelector('i');
    icon.classList.toggle('far');
    icon.classList.toggle('fas');
    icon.classList.toggle('text-red-600');
    
    if (icon.classList.contains('fas')) {
        button.style.backgroundColor = '#fef2f2';
    } else {
        button.style.backgroundColor = 'white';
    }
}

let bestsellerScroll = 0;

function scrollBestsellers(direction) {
    const carousel = document.getElementById('bestsellersCarousel');
    const cards = carousel.querySelectorAll('.best-seller-card');
    const cardWidth = cards[0].offsetWidth + 16; // card width + gap
    
    bestsellerScroll += direction * cardWidth;
    
    // Limit scroll
    const maxScroll = (cards.length - 5) * cardWidth;
    if (bestsellerScroll < 0) bestsellerScroll = 0;
    if (bestsellerScroll > maxScroll) bestsellerScroll = maxScroll;
    
    carousel.style.transform = `translateX(-${bestsellerScroll}px)`;
    carousel.style.transition = 'transform 0.3s ease';
}

// Auto-rotate main carousel every 5 seconds
setInterval(carouselNext, 5000);
</script>
@endsection
