@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 shadow rounded">

    <h2 class="text-xl font-bold mb-4">Enquiries</h2>

    @forelse($enquiries as $enquiry)
        <div class="border p-4 rounded mb-3">
            <strong>{{ $enquiry->name }}</strong>
            <p class="text-sm text-gray-600">{{ $enquiry->email }}</p>

            <p class="mt-2">{{ $enquiry->message }}</p>

            <small class="text-gray-500">
                Listing: <a href="{{ route('listing.show', $enquiry->listing) }}"
                            class="text-blue-600 hover:underline">
                                {{ $enquiry->listing->title }}
                            </a>
            </small>
        </div>
    @empty
        <p>No enquiries yet.</p>
    @endforelse

    {{ $enquiries->links() }}
</div>
@endsection
