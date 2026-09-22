<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $barbershop = Auth::user()->barbershop;

        if (!$barbershop) {
            $reviews = collect();
            $avgRating = null;
            $totalReviews = 0;
            $capsters = collect();
            return view('reviews', compact('reviews', 'avgRating', 'totalReviews', 'capsters'));
        }

        $baseQuery = Review::whereHas('booking', fn($q) => $q->where('barbershop_id', $barbershop->id));

        $avgRating = (clone $baseQuery)->avg('rating') ? round((clone $baseQuery)->avg('rating'), 1) : null;
        $totalReviews = (clone $baseQuery)->count();

        $reviews = (clone $baseQuery)
            ->when($request->rating, fn($q, $v) => $q->where('rating', $v))
            ->when($request->capster_id, fn($q, $v) => $q->where('capster_id', $v))
            ->with(['customer', 'capster.user'])
            ->latest()
            ->get();

        $capsters = $barbershop->capsters()->with('user')->where('is_active', true)->get();

        return view('reviews', compact('reviews', 'avgRating', 'totalReviews', 'capsters'));
    }

    public function toggleHidden(Request $request, Review $review)
    {
        $review->loadMissing('booking');

        abort_if(!$review->booking || $review->booking->barbershop_id !== Auth::user()->barbershop?->id, 403);

        $review->update([
            'is_hidden' => !$review->is_hidden,
        ]);

        return response()->json([
            'is_hidden' => $review->is_hidden,
        ]);
    }
}
