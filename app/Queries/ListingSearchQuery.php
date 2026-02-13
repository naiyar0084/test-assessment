<?php

namespace App\Queries;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ListingSearchQuery
{
    public function build(Request $request): Builder
    {
        return Listing::query()
            ->where('status', 'approved')

            ->when($request->filled('keyword'), function (Builder $q) use ($request) {
                $q->where('title', 'like', '%' . $request->keyword . '%');
            })

            ->when($request->filled('category'), function (Builder $q) use ($request) {
                $q->where('category', $request->category);
            })

            ->when($request->filled('city'), function (Builder $q) use ($request) {
                $q->where('city', 'like', '%' . $request->city . '%'); })

            ->when($request->filled('price_min'), function (Builder $q) use ($request) {
                $q->where('price', '>=', $request->price_min);
            })

            ->when($request->filled('price_max'), function (Builder $q) use ($request) {
                $q->where('price', '<=', $request->price_max);
            })

            ->when($request->filled('sort'), function (Builder $q) use ($request) {
                match ($request->sort) {
                    'price'   => $q->orderBy('price'),
                    'newest'  => $q->latest(),
                    default   => null,
                };
            });
    }
}
