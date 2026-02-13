<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;

use App\Models\Listing;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Actions\SaveListing;

class ProviderListingController extends Controller
{
    public function index()
    {
       
        $listings = auth()->user()
            ->listings()
            ->latest()
            ->paginate(10);

        return view('provider.listings.index', compact('listings'));
    }

    public function create()
    {
        //dd(auth()->check(), auth()->user());
        return view('provider.listings.create');
    }

   public function store(StoreListingRequest $request, SaveListing $action)
{
    $action->handle(
        $request->validated(),
        auth()->user()
    );

    return redirect()
        ->route('provider.listings.index')
        ->with('success', 'Listing created and sent for review.');
}


    public function edit(Listing $listing)
    {
        $this->authorize('update', $listing);

        return view('provider.listings.edit', compact('listing'));
    }

    public function update(UpdateListingRequest $request, Listing $listing, SaveListing $action)
    {
        $this->authorize('update', $listing);

        $action->handle($request->validated(), auth()->user(), $listing);

        return back()->with('success', 'Listing updated.');
    }
}
