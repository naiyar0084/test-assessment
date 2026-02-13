<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing; 

class AdminListingController extends Controller
{
    public function index()
    {
        $listings = Listing::where('status', 'pending')->paginate(10);

        return view('admin.listings.index', compact('listings'));
    }

    public function approve(Listing $listing)
    {
        $listing->update(['status' => 'approved']);

        return back();
    }

    public function reject(Request $request, Listing $listing)
    {
        $listing->update([
            'status' => 'draft',
            'moderation_note' => $request->note,
        ]);

        return back();
    }

    public function suspend(Listing $listing)
    {
        $listing->update(['status' => 'suspended']);

        return back();
    }
}

