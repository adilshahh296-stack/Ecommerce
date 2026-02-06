<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to leave a review');
        }

        $validated = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ]);

        // Check if user already reviewed this product
        $existingReview = Review::where('product_id', $product->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingReview) {
            $existingReview->update($validated);
            return back()->with('success', 'Review updated successfully!');
        }

        Review::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
            'is_approved' => false, // Admin approval required
        ]);

        return back()->with('success', 'Review submitted! It will appear after admin approval.');
    }

    /**
     * Delete the specified review.
     */
    public function destroy(Review $review): RedirectResponse
    {
        if (Auth::id() !== $review->user_id && !Auth::user()->is_admin) {
            throw new AuthorizationException();
        }

        $product = $review->product;
        $review->delete();

        return back()->with('success', 'Review deleted successfully!');
    }
}
