@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Provider Listings</h2>

        <a href="{{ route('provider.listings.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
            <i class="fas fa-plus"></i>
            Create Listing
        </a>
    </div>

    <hr class="mb-6">

    @forelse($listings as $listing)
        <div class="border p-4 rounded mb-4 flex items-start justify-between">

            <div>
                <h3 class="text-lg font-semibold">
                    {{ $listing->title }}
                </h3>

                {{-- STATUS BADGE --}}
                <span class="inline-block mt-1 px-2 py-1 text-xs rounded
                    @if($listing->status === 'approved')
                        bg-green-100 text-green-700
                    @elseif($listing->status === 'pending')
                        bg-yellow-100 text-yellow-700
                    @elseif($listing->status === 'rejected')
                        bg-red-100 text-red-700
                    @else
                        bg-gray-100 text-gray-700
                    @endif
                ">
                    {{ ucfirst($listing->status) }}
                </span>

                @if($listing->status === 'rejected')
                    <p class="text-sm text-red-600 mt-2">
                        <strong>Reason:</strong> {{ $listing->moderation_note }}
                    </p>
                @endif
            </div>

            {{-- ACTIONS --}}
            <div class="flex gap-3">
                <a href="{{ route('provider.listings.edit', $listing) }}"
                   class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800">
                    <i class="fas fa-edit"></i>
                    Edit
                </a>
            </div>

        </div>
    @empty
        <p class="text-gray-500">No listings found.</p>
    @endforelse

    <div class="mt-6">
        {{ $listings->links() }}
    </div>

</div>
@endsection
