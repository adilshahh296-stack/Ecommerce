<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Electronics
        Product::create([
            'category_id' => 1,
            'name' => 'Luxury Smart Watch Pro',
            'slug' => 'luxury-smart-watch-pro',
            'description' => 'Premium titanium smartwatch with sapphire crystal and 7-day battery life.',
            'price' => 2499.00,
            'original_price' => 3299.00,
            'stock' => 15,
            'image' => 'https://images.unsplash.com/photo-1579364848515-86d0471d0609?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 127,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Diamond Edition Headphones',
            'slug' => 'diamond-edition-headphones',
            'description' => 'Hand-crafted wireless headphones with Swarovski crystals.',
            'price' => 1899.00,
            'original_price' => 2599.00,
            'stock' => 12,
            'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 89,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Ultra Premium Tablet Gold',
            'slug' => 'ultra-premium-tablet-gold',
            'description' => 'Limited edition tablet with 24K gold accents.',
            'price' => 3599.00,
            'original_price' => 4999.00,
            'stock' => 8,
            'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 156,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Diamond Smartphone Pro',
            'slug' => 'diamond-smartphone-pro',
            'description' => 'Exclusive smartphone with real diamond accents.',
            'price' => 4999.00,
            'original_price' => 6999.00,
            'stock' => 5,
            'image' => 'https://images.unsplash.com/photo-1511707267537-b85faf00021e?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 98,
            'is_active' => true,
        ]);

        // Fashion
        Product::create([
            'category_id' => 2,
            'name' => 'Italian Leather Handbag',
            'slug' => 'italian-leather-handbag',
            'description' => 'Hand-stitched premium Italian leather with gold-plated hardware.',
            'price' => 2199.00,
            'original_price' => 2999.00,
            'stock' => 10,
            'image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 234,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Swiss Luxury Watch',
            'slug' => 'swiss-luxury-watch',
            'description' => 'Swiss timepiece with automatic movement and sapphire crystal.',
            'price' => 5499.00,
            'original_price' => 7299.00,
            'stock' => 6,
            'image' => 'https://images.unsplash.com/photo-1523170335258-f5ed11844a49?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 512,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Designer Sunglasses',
            'slug' => 'designer-sunglasses',
            'description' => 'Exclusive aviator sunglasses with polarized lenses.',
            'price' => 899.00,
            'original_price' => 1299.00,
            'stock' => 20,
            'image' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 289,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Platinum Diamond Necklace',
            'slug' => 'platinum-diamond-necklace',
            'description' => 'Platinum necklace with certified diamonds.',
            'price' => 8999.00,
            'original_price' => 12999.00,
            'stock' => 4,
            'image' => 'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 178,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Gold Bracelet Collection',
            'slug' => 'gold-bracelet-collection',
            'description' => '18K yellow gold bracelet with intricate craftsmanship.',
            'price' => 3299.00,
            'original_price' => 4499.00,
            'stock' => 8,
            'image' => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 145,
            'is_active' => true,
        ]);

        // Home & Kitchen
        Product::create([
            'category_id' => 3,
            'name' => 'Crystal Dining Set',
            'slug' => 'crystal-dining-set',
            'description' => 'Baccarat crystal dining service for 12.',
            'price' => 4899.00,
            'original_price' => 6999.00,
            'stock' => 5,
            'image' => 'https://images.unsplash.com/photo-1578749556568-bc2c40e68b61?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 67,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Italian Marble Countertop',
            'slug' => 'italian-marble-countertop',
            'description' => 'Rare Carrara marble slab for kitchen renovations.',
            'price' => 3299.00,
            'original_price' => 4599.00,
            'stock' => 3,
            'image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 45,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Premium Coffee Machine',
            'slug' => 'premium-coffee-machine',
            'description' => 'Italian espresso machine with temperature control.',
            'price' => 1599.00,
            'original_price' => 2199.00,
            'stock' => 14,
            'image' => 'https://images.unsplash.com/photo-1517668808822-9ebb02ae2a0e?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 178,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Luxury Cutlery Set',
            'slug' => 'luxury-cutlery-set',
            'description' => 'Premium stainless steel cutlery. 24-piece set.',
            'price' => 799.00,
            'original_price' => 1199.00,
            'stock' => 18,
            'image' => 'https://images.unsplash.com/photo-1578500494198-246f612d03b3?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 92,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Premium Wine Cooler',
            'slug' => 'premium-wine-cooler',
            'description' => 'Temperature-controlled wine cooler for 24 bottles.',
            'price' => 2499.00,
            'original_price' => 3299.00,
            'stock' => 7,
            'image' => 'https://images.unsplash.com/photo-1576270626005-12ba6da84e64?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 134,
            'is_active' => true,
        ]);

        // Sports & Outdoors
        Product::create([
            'category_id' => 4,
            'name' => 'Titanium Golf Set',
            'slug' => 'titanium-golf-set',
            'description' => 'Professional golf clubs with titanium heads.',
            'price' => 3999.00,
            'original_price' => 5299.00,
            'stock' => 7,
            'image' => 'https://images.unsplash.com/photo-1587280591945-b99f1903ac23?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 134,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Mountain Bike Elite',
            'slug' => 'mountain-bike-elite',
            'description' => 'Carbon fiber mountain bike with full suspension.',
            'price' => 2899.00,
            'original_price' => 3999.00,
            'stock' => 9,
            'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 98,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Luxury Yacht Equipment',
            'slug' => 'luxury-yacht-equipment',
            'description' => 'Premium navigation equipment for luxury yachts.',
            'price' => 8999.00,
            'original_price' => 11999.00,
            'stock' => 2,
            'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 23,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Premium Diving Equipment',
            'slug' => 'premium-diving-equipment',
            'description' => 'Professional diving gear with certification.',
            'price' => 1999.00,
            'original_price' => 2699.00,
            'stock' => 11,
            'image' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 76,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Luxury Tennis Racket',
            'slug' => 'luxury-tennis-racket',
            'description' => 'Professional tennis racket with carbon composite.',
            'price' => 899.00,
            'original_price' => 1299.00,
            'stock' => 16,
            'image' => 'https://images.unsplash.com/photo-1554068865-24cecd4e34c8?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 143,
            'is_active' => true,
        ]);

        // Beauty & Health
        Product::create([
            'category_id' => 5,
            'name' => 'Diamond Facial Treatment',
            'slug' => 'diamond-facial-treatment',
            'description' => 'Luxury facial kit with diamond powder.',
            'price' => 799.00,
            'original_price' => 1199.00,
            'stock' => 25,
            'image' => 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 412,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 5,
            'name' => 'Wellness Spa Package',
            'slug' => 'wellness-spa-package',
            'description' => 'Exclusive spa treatment with mineral oils.',
            'price' => 1299.00,
            'original_price' => 1899.00,
            'stock' => 18,
            'image' => 'https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 289,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 5,
            'name' => 'Premium Jewelry Cleaner',
            'slug' => 'premium-jewelry-cleaner',
            'description' => 'Professional jewelry cleaning solution.',
            'price' => 599.00,
            'original_price' => 899.00,
            'stock' => 30,
            'image' => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 156,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 5,
            'name' => 'Luxury Anti-Aging Serum',
            'slug' => 'luxury-anti-aging-serum',
            'description' => 'Premium serum with gold particles and hyaluronic acid.',
            'price' => 499.00,
            'original_price' => 799.00,
            'stock' => 22,
            'image' => 'https://images.unsplash.com/photo-1556228528-8c89e6adf883?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 267,
            'is_active' => true,
        ]);

        Product::create([
            'category_id' => 5,
            'name' => 'Premium Perfume Collection',
            'slug' => 'premium-perfume-collection',
            'description' => 'Exclusive fragrance collection with rare essences.',
            'price' => 999.00,
            'original_price' => 1499.00,
            'stock' => 19,
            'image' => 'https://images.unsplash.com/photo-1595777707707-c4d37a7d3042?w=500&h=500&fit=crop&q=80',
            'rating' => 5,
            'reviews_count' => 334,
            'is_active' => true,
        ]);
    }
}
