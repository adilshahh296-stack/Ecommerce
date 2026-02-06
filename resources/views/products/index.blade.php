@extends('app')

@section('title', 'Products')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-6">
    <!-- Sidebar -->
    <div class="col-span-1">
        <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24 space-y-6">
            <!-- Search -->
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                    <i class="fas fa-search text-blue-600"></i>Search
                </h3>
                <form action="{{ route('products.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit" class="w-full mt-2 bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Search</button>
                </form>
            </div>

            <!-- Price Filter -->
            <div class="border-t pt-6">
                <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                    <i class="fas fa-tags text-green-600"></i>Price Range
                </h3>
                <form action="{{ route('products.index') }}" method="GET" class="space-y-3">
                    <div>
                        <label class="text-sm text-gray-600 font-semibold">Min Price (AED)</label>
                        <input type="number" name="min_price" placeholder="0" value="{{ request('min_price') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="text-sm text-gray-600 font-semibold">Max Price (AED)</label>
                        <input type="number" name="max_price" placeholder="10000" value="{{ request('max_price') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">Apply Filter</button>
                </form>
            </div>

            <!-- Sort -->
            <div class="border-t pt-6">
                <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                    <i class="fas fa-sort text-purple-600"></i>Sort By
                </h3>
                <form action="{{ request()->url() }}" method="GET" onchange="this.submit()">
                    @foreach (request()->query() as $key => $value)
                        @if ($key !== 'sort')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <select name="sort" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest Arrivals</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                        <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                    </select>
                </form>
            </div>

            <!-- Categories -->
            <div class="border-t pt-6">
                <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                    <i class="fas fa-list text-orange-600"></i>Categories
                </h3>
                <div class="space-y-2">
                    <a href="{{ route('products.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition font-semibold text-gray-700 border-l-4 border-transparent hover:border-blue-600">
                        All Products
                    </a>
                    
                    @forelse($categories as $category)
                        <a href="{{ route('products.category', $category) }}" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition text-gray-700 border-l-4 border-transparent hover:border-blue-600">
                            {{ $category->name }}
                            <span class="text-xs text-gray-500 block mt-1">{{ $category->products()->where('is_active', 1)->count() }} items</span>
                        </a>
                    @empty
                        <p class="text-gray-500">No categories</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="col-span-1 md:col-span-3 lg:col-span-4">
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-4xl font-bold text-gray-800">All Products</h1>
                    <p class="text-gray-600 mt-1">
                        @if(request('search'))
                            Results for "<strong>{{ request('search') }}</strong>"
                        @else
                            Showing all products
                        @endif
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-gray-600">
                        <span class="font-bold text-lg text-blue-600">{{ $products->count() }}</span> products found
                    </p>
                </div>
            </div>
        </div>
                @elseif(isset($category))
                    {{ $category->name }}
                @else
                    Browse our exclusive selection of luxury items
                @endif
            </p>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
                @foreach($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="bg-white rounded-lg shadow hover:shadow-2xl transition overflow-hidden group">
                        <!-- Image -->
                        <div class="bg-gray-100 h-56 flex items-center justify-center overflow-hidden relative">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @if($product->original_price && $product->original_price > $product->price)
                                <div class="absolute top-3 right-3 bg-red-500 text-white px-4 py-2 rounded-full font-bold text-sm shadow-lg">
                                    -{{ round((1 - $product->price / $product->original_price) * 100) }}%
                                </div>
                            @endif
                            @if($product->stock <= 5 && $product->stock > 0)
                                <div class="absolute top-3 left-3 bg-orange-500 text-white px-3 py-1 rounded text-xs font-semibold">
                                    Only {{ $product->stock }} left!
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-4">
                            @if($product->category)
                                <p class="text-blue-600 text-xs font-bold uppercase tracking-wide mb-1">{{ $product->category->name }}</p>
                            @endif
                            
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
                                <span class="text-xs text-gray-600 ml-1">({{ $product->reviews_count ?? 0 }})</span>
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

                            <!-- Stock Status -->
                            <div class="mb-3">
                                @if($product->stock > 0)
                                    <span class="text-xs text-green-600 font-semibold">✓ In Stock</span>
                                @else
                                    <span class="text-xs text-red-600 font-semibold">Out of Stock</span>
                                @endif
                            </div>

                            <!-- Button -->
                            <button type="button" onclick="event.preventDefault(); addToCart({{ $product->id }})" class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition text-sm">
                                Add to Cart
                            </button>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $products->links() }}
            </div>
        @else
            <div class="col-span-4 text-center py-20 bg-gray-50 rounded-lg">
                <i class="fas fa-search text-gray-300 text-6xl mb-4"></i>
                <p class="text-gray-600 text-xl font-semibold">No products found</p>
                <p class="text-gray-500">Try adjusting your search or filters</p>
                <a href="{{ route('products.index') }}" class="inline-block mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    View All Products
                </a>
            </div>
        @endif
    </div>
</div>

<script>
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
@endsection
