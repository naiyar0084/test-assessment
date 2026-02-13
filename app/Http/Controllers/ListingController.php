<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Queries\ListingSearchQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ListingController extends Controller
{
    public function index(Request $request, ListingSearchQuery $search)
    {
        $listings = $search
            ->build($request)
            ->paginate(10)
            ->withQueryString();

        $categories = Listing::where('status', 'approved')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');


        return view('listings.index', compact('listings', 'categories'));
    }

    public function show(Listing $listing)
    {
        abort_unless($listing->status === 'approved', 404);

        $listing = Cache::remember(
            "listing:{$listing->id}",
            now()->addMinutes(10),
            fn () => $listing
        );

        return view('listings.show', compact('listing'));
    }
}
