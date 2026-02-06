<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::where('is_active', true)->get();
        $query = Product::where('is_active', true);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by price
        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by rating
        if ($request->has('min_rating') && $request->min_rating) {
            $minRating = $request->min_rating;
            $query->whereHas('reviews', function ($q) use ($minRating) {
                $q->where('is_approved', true);
            }, '>=', function ($q) use ($minRating) {
                $q->selectRaw('avg(rating) as avg_rating');
            });
        }

        // Sort
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'popular':
                $query->withCount('orderItems')->orderBy('order_items_count', 'desc');
                break;
            case 'rating':
                $query->withCount('reviews')->orderBy('reviews_count', 'desc');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12);
        
        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product): View
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        $approvedReviews = $product->reviews()->where('is_approved', true)->latest()->paginate(5);
        $averageRating = $product->getAverageRating();
        $reviewCount = $product->getApprovedReviewsCount();

        return view('products.show', compact('product', 'relatedProducts', 'approvedReviews', 'averageRating', 'reviewCount'));
    }

    public function category(Category $category, Request $request): View
    {
        $categories = Category::where('is_active', true)->get();
        $query = $category->products()->where('is_active', true);

        // Apply same filters as index
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12);
        
        return view('products.index', compact('products', 'categories', 'category'));
    }
}

