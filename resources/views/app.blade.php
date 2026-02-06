<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - BRIGHT MAX TRADING</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .carousel-slide { display: none; }
        .carousel-slide.active { display: block; }
        .star-rating { color: #fbbf24; }
        .category-card { transition: all 0.3s ease; }
        .category-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-white border-b border-gray-200 py-2 px-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center text-sm text-gray-600">
            <div class="flex gap-6">
                <a href="#" class="hover:text-blue-600">Seller Centre</a>
                <a href="#" class="hover:text-blue-600">Download App</a>
                <a href="#" class="hover:text-blue-600">Help & Support</a>
            </div>
            <div class="flex gap-4 items-center">
                <i class="fas fa-map-marker-alt"></i>
                <span>Deliver to Malaysia, Oman, Qatar, Kuwait, Bahrain</span>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between gap-4 mb-3">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-2 rounded-lg">
                        <i class="fas fa-store text-white text-xl"></i>
                    </div>
                    <div class="hidden sm:block">
                        <div class="text-sm font-bold text-blue-600">BRIGHT MAX</div>
                        <div class="text-xs text-gray-500">TRADING</div>
                    </div>
                </a>

                <!-- Search Bar -->
                <div class="flex-1 max-w-2xl">
                    <form action="{{ route('products.index') }}" method="GET" class="relative">
                        <div class="flex">
                            <input type="text" name="search" placeholder="What are you looking for?" value="{{ request('search') }}" class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-r-lg font-semibold hover:bg-blue-700 transition">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center gap-6">
                    <a href="{{ route('cart.index') }}" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                        <span class="bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold absolute -mt-4">{{ count(session('cart', [])) }}</span>
                    </a>

                    @auth
                        <div class="relative group">
                            <button class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                                <i class="fas fa-user-circle text-2xl"></i>
                                <span class="text-sm hidden md:inline">{{ Auth::user()->name }}</span>
                            </button>
                            <div class="absolute right-0 mt-0 w-48 bg-white rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition z-50 border border-gray-200">
                                <a href="{{ route('profile.show') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 border-b">
                                    <i class="fas fa-user mr-2"></i>My Profile
                                </a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 border-b">
                                    <i class="fas fa-edit mr-2"></i>Edit Profile
                                </a>
                                <a href="/orders" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 border-b">
                                    <i class="fas fa-box mr-2"></i>My Orders
                                </a>
                                <form action="{{ route('logout') }}" method="POST" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-red-50">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-blue-600 transition">
                            <i class="fas fa-sign-in-alt mr-1"></i>Login
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded font-semibold hover:bg-blue-700 transition text-sm">
                            Sign Up
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Category Navigation -->
            <div class="border-t border-gray-200 pt-3">
                <div class="flex items-center gap-4 overflow-x-auto pb-2">
                    <a href="{{ route('products.index') }}" class="flex items-center gap-2 px-3 py-2 text-gray-700 hover:text-blue-600 whitespace-nowrap font-semibold">
                        <i class="fas fa-bars text-xl"></i> All Categories
                    </a>
                    <a href="{{ route('products.index') }}?category=electronics" class="px-3 py-2 text-gray-600 hover:text-blue-600 whitespace-nowrap transition">Electronics</a>
                    <a href="{{ route('products.index') }}?category=fashion" class="px-3 py-2 text-gray-600 hover:text-blue-600 whitespace-nowrap transition">Fashion</a>
                    <a href="{{ route('products.index') }}?category=home" class="px-3 py-2 text-gray-600 hover:text-blue-600 whitespace-nowrap transition">Home & Kitchen</a>
                    <a href="{{ route('products.index') }}?category=sports" class="px-3 py-2 text-gray-600 hover:text-blue-600 whitespace-nowrap transition">Sports</a>
                    <a href="{{ route('products.index') }}?category=beauty" class="px-3 py-2 text-gray-600 hover:text-blue-600 whitespace-nowrap transition">Beauty</a>
                    <a href="{{ route('products.index') }}?category=books" class="px-3 py-2 text-gray-600 hover:text-blue-600 whitespace-nowrap transition">Books</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if ($message = Session::get('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 m-4 rounded shadow-md flex items-center gap-3">
            <i class="fas fa-check-circle text-green-500 text-xl"></i>
            <span>{{ $message }}</span>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 m-4 rounded shadow-md flex items-center gap-3">
            <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
            <span>{{ $message }}</span>
        </div>
    @endif

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        @yield('content')
    </div>

    <!-- WhatsApp Floating Button -->
    @include('components.whatsapp-button')

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 mt-20 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="font-bold text-[#50C878] mb-4">About BRIGHT MAX TRADING</h3>
                    <p class="text-sm">Premium luxury trading platform specializing in fine jewelry and high-end real estate in the Middle East.</p>
                </div>
                <div>
                    <h3 class="font-bold text-[#50C878] mb-4">Categories</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">Electronics</a></li>
                        <li><a href="#" class="hover:text-white">Fashion</a></li>
                        <li><a href="#" class="hover:text-white">Home & Kitchen</a></li>
                        <li><a href="#" class="hover:text-white">Sports & Outdoors</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-[#50C878] mb-4">Help & Support</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white">Track Order</a></li>
    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 mt-20 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 py-16">
            <div class="grid grid-cols-5 gap-8 mb-8">
                <div>
                    <h3 class="font-bold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-500"></i>About Us
                    </h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">About BRIGHT MAX</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Press</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-shopping-bag text-blue-500"></i>Categories
                    </h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Electronics</a></li>
                        <li><a href="#" class="hover:text-white transition">Fashion</a></li>
                        <li><a href="#" class="hover:text-white transition">Home & Kitchen</a></li>
                        <li><a href="#" class="hover:text-white transition">Sports</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-headset text-blue-500"></i>Support
                    </h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
                        <li><a href="{{ route('orders.track') }}" class="hover:text-white transition">Track Order</a></li>
                        <li><a href="#" class="hover:text-white transition">Returns</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQs</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-lock text-blue-500"></i>Legal
                    </h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-white transition">Cookie Policy</a></li>
                        <li><a href="#" class="hover:text-white transition">Sitemap</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-globe text-blue-500"></i>Follow Us
                    </h3>
                    <div class="flex gap-4">
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition text-2xl">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition text-2xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition text-2xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition text-2xl">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 pt-8 text-center text-sm">
                <p>&copy; 2026 BRIGHT MAX TRADING. All rights reserved. | Premium E-Commerce Platform Serving Malaysia, Oman, Qatar, Kuwait & Bahrain</p>
            </div>
        </div>
    </footer>
</body>
</html>
