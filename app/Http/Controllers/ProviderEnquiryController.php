<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class ProviderEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::whereHas('listing', function ($q) {
                $q->where('user_id', auth()->id());
            })
            ->latest()
            ->paginate(20);

        return view('provider.enquiries.index', compact('enquiries'));
    }
}
