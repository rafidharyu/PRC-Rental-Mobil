<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    public function index(): View
    {
        return view('backend.review.index', [
            'reviews' => Review::with('transaction:id,code,name,car_id')->latest()->paginate(10),
        ]);
    }

    public function show(string $uuid): View
    {
        $review = Review::with('transaction:id,code,name,car_id')
            ->whereUuid($uuid)->firstOrFail();

        return view('backend.review.show', [
            'review' => $review
        ]);
    }

    public function destroy(string $uuid): JsonResponse
    {
        // Check if the user is not an operator
        if (auth()->check() && auth()->user()->role !== 'operator') {
            return response()->json([
                'message' => 'You are not authorized to delete this review.'
            ]);
        }

        $review = Review::where('uuid', $uuid)->firstOrFail();
        $review->delete();

        return response()->json([
            'message' => 'Review deleted successfully'
        ]);
    }
}
