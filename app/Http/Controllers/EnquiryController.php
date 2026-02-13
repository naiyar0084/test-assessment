<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\CreateEnquiry;
use App\Http\Requests\StoreEnquiryRequest;

class EnquiryController extends Controller
{
    public function store(StoreEnquiryRequest $request, CreateEnquiry $action)
    {
        $action->handle($request->validated());

        return back()->with('success', 'Your enquiry has been sent.');
    }
}
