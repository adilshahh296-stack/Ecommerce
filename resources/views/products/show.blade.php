@extends('app')

@section('title', $product->name)

@section('content')
<div class="grid grid-cols-2 gap-12 mb-12">
    <!-- Product Image -->
    <div>
        <div class="bg-gray-100 rounded-lg h-96 flex items-center justify-center shadow-md overflow-hidden mb-4 sticky top-24">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
    </div>

    <!-- Product Details -->
    <div>
        @if($product->category)
            <a href="{{ route('products.category', $product->category) }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm uppercase tracking-wide">{{ $product->category->name }}</a>
        @endif
        
        <h1 class="text-4xl font-bold my-4 text-gray-800">{{ $product->name }}</h1>
        
        <!-- Rating Section -->
        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-200">
            <div class="flex star-rating text-2xl">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < round($averageRating))
                        <i class="fas fa-star"></i>
                    @else
                        <i class="far fa-star text-gray-300"></i>
                    @endif
                @endfor
            </div>
            <span class="text-gray-600">({{ $reviewCount }} reviews)</span>
            @if ($averageRating > 0)
                <span class="text-lg font-semibold text-gray-900">{{ number_format($averageRating, 1) }}/5</span>
            @endif
        </div>

        <!-- Price Section -->
        <div class="mb-6 pb-6 border-b border-gray-200">
            <div class="flex items-baseline gap-4 mb-3">
                <span class="text-5xl font-bold text-gray-900">AED {{ number_format($product->price, 0) }}</span>
                @if($product->original_price)
                    <span class="text-2xl text-gray-500 line-through">AED {{ number_format($product->original_price, 0) }}</span>
                    <span class="text-red-600 font-bold text-lg bg-red-100 px-3 py-1 rounded">-{{ round(((($product->original_price - $product->price) / $product->original_price) * 100)) }}%</span>
                @endif
            </div>
        </div>

        <!-- Description -->
        <div class="mb-6 pb-6 border-b border-gray-200">
            <p class="text-gray-700 leading-relaxed text-lg">{{ $product->description }}</p>
        </div>

        <!-- Stock Status -->
        <div class="mb-6">
            <span class="text-gray-700 font-semibold">Stock Status: </span>
            @if($product->stock > 0)
                <span class="text-lg text-green-600 font-bold">
                    <i class="fas fa-check-circle"></i> {{ $product->stock }} items in stock
                </span>
            @else
                <span class="text-lg text-red-600 font-bold">
                    <i class="fas fa-times-circle"></i> Out of stock
                </span>
            @endif
        </div>

        <!-- Add to Cart Section -->
        @if($product->stock > 0)
            <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-6">
                @csrf
                <div class="flex gap-4 mb-4">
                    <div class="flex items-center border border-gray-300 rounded-lg">
                        <button type="button" onclick="decreaseQty()" class="px-4 py-2 text-gray-600 hover:bg-gray-100">-</button>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="border-0 px-4 py-2 w-16 text-center font-semibold focus:outline-none">
                        <button type="button" onclick="increaseQty({{ $product->stock }})" class="px-4 py-2 text-gray-600 hover:bg-gray-100">+</button>
                    </div>
                    <button type="submit" class="flex-1 bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 font-bold transition text-lg flex items-center justify-center gap-2">
                        <i class="fas fa-shopping-cart"></i>Add to Cart
                    </button>
                </div>
                <button type="button" class="w-full bg-gray-100 text-gray-800 px-8 py-3 rounded-lg hover:bg-gray-200 font-semibold transition">
                    <i class="far fa-heart mr-2"></i>Add to Wishlist
                </button>
            </form>
        @else
            <button disabled class="w-full bg-gray-400 text-white px-8 py-3 rounded-lg font-bold opacity-50 cursor-not-allowed text-lg">
                <i class="fas fa-ban mr-2"></i>Out of Stock
            </button>
        @endif

        <!-- Key Features -->
        <div class="bg-blue-50 border-l-4 border-blue-600 p-6 rounded">
            <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-shield-alt text-blue-600"></i>Why Buy From Us
            </h3>
            <ul class="space-y-3 text-gray-700">
                <li class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-600"></i>
                    <span><strong>Authentic Products</strong> - 100% genuine items guaranteed</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-600"></i>
                    <span><strong>Fast & Safe Shipping</strong> - Insured delivery to your door</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-600"></i>
                    <span><strong>Secure Checkout</strong> - Safe payment processing</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-600"></i>
                    <span><strong>30-Day Returns</strong> - Hassle-free return policy</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Reviews Section -->
<div class="mt-16 bg-gray-50 rounded-lg p-8">
    <h2 class="text-3xl font-bold mb-8 text-gray-800">Customer Reviews</h2>

    @auth
        <!-- Review Form -->
        <div class="bg-white rounded-lg p-6 mb-8 border-l-4 border-blue-600">
            <h3 class="text-xl font-bold mb-6 text-gray-800">Leave a Review</h3>
            <form action="{{ route('reviews.store', $product) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="rating" class="block text-sm font-semibold text-gray-700 mb-3">Your Rating</label>
                    <div class="flex gap-3">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="rating-{{ $i }}" name="rating" value="{{ $i }}" class="hidden" required>
                            <label for="rating-{{ $i }}" class="cursor-pointer text-4xl transition transform hover:scale-125">
                                <i class="far fa-star text-gray-300 hover:text-yellow-400"></i>
                            </label>
                        @endfor
                    </div>
                </div>
                <div>
                    <label for="comment" class="block text-sm font-semibold text-gray-700 mb-2">Your Review</label>
                    <textarea name="comment" id="comment" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" placeholder="Share your experience with this product..."></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                    <i class="fas fa-star mr-2"></i>Submit Review
                </button>
            </form>
        </div>
    @else
        <div class="bg-blue-50 rounded-lg p-6 mb-8 border-l-4 border-blue-600">
            <p class="text-gray-700">
                Please <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">login</a> to leave a review.
            </p>
        </div>
    @endauth

    <!-- Reviews List -->
    <div class="space-y-6">
        @forelse ($approvedReviews as $review)
            <div class="bg-white rounded-lg p-6 border-l-4 border-blue-600 shadow hover:shadow-md transition">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h4 class="font-bold text-gray-800">{{ $review->user->name }}</h4>
                        <p class="text-sm text-gray-500 flex items-center gap-2">
                            <i class="fas fa-calendar-alt"></i>{{ $review->created_at->format('M d, Y') }}
                        </p>
                    </div>
                    <div class="text-yellow-400 text-lg">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $review->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star text-gray-300"></i>
                            @endif
                        @endfor
                    </div>
                </div>
                @if($review->comment)
                    <p class="text-gray-700">{{ $review->comment }}</p>
                @endif
            </div>
        @empty
            <div class="text-center py-12 text-gray-500">
                <i class="fas fa-comments text-gray-300 text-5xl mb-4"></i>
                <p>No reviews yet. Be the first to review!</p>
            </div>
        @endforelse
    </div>
</div>

<script>
function decreaseQty() {
    const input = document.getElementById('quantity');
    if (input.value > 1) input.value = parseInt(input.value) - 1;
}

function increaseQty(max) {
    const input = document.getElementById('quantity');
    if (parseInt(input.value) < max) input.value = parseInt(input.value) + 1;
}

// Interactive star rating
document.querySelectorAll('label[for^="rating-"]').forEach(label => {
    label.addEventListener('click', function() {
        const rating = this.getAttribute('for').split('-')[1];
        document.querySelectorAll('label[for^="rating-"]').forEach((l, index) => {
            if (index < rating) {
                l.innerHTML = '<i class="fas fa-star text-yellow-400"></i>';
            } else {
                l.innerHTML = '<i class="far fa-star text-gray-300 hover:text-yellow-400"></i>';
            }
        });
    });
});
</script>
@endsection
                                ☆
                            @endif
                        @endfor
                    </div>
                </div>
                @if ($review->comment)
                    <p class="text-gray-700">{{ $review->comment }}</p>
                @endif
                @auth
                    @if (Auth::id() === $review->user_id)
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-semibold">Delete</button>
                        </form>
                    @endif
                @endauth
            </div>
        @empty
            <p class="text-gray-600">No reviews yet. Be the first to review!</p>
        @endforelse
    </div>

    @if ($approvedReviews->hasPages())
        <div class="mt-6">
            {{ $approvedReviews->links() }}
        </div>
    @endif
</div>
@endsection
