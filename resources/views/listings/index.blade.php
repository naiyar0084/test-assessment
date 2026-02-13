@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">
<h2 class="text-xl font-bold mb-4">Listings</h2>

<form method="GET" action="{{ url('/') }}" class="space-y-3">

    {{-- Keyword --}}
    <input
        type="text"
        name="keyword"
        value="{{ request('keyword') }}"
        placeholder="Search…"
        class="w-full border rounded px-3 py-2"
    >

    {{-- Category --}}
    <select name="category" data-auto-submit class="w-full border rounded px-3 py-2">
        <option value="">All Categories</option>

        @foreach($categories as $category)
            <option value="{{ $category }}"
                @selected(request('category') === $category)>
                {{ ucfirst($category) }}
            </option>
        @endforeach
    </select>

    {{-- City --}}
    <input
        type="text"
        name="city"
        value="{{ request('city') }}"
        placeholder="City"
        class="w-full border rounded px-3 py-2" >

    {{-- Price range --}}
    <div class="flex gap-2">
        <input
            type="number"
            name="price_min"
            value="{{ request('price_min') }}"
            placeholder="Min Price"
            class="w-1/2 border rounded px-3 py-2" >

        <input
            type="number"
            name="price_max"
            value="{{ request('price_max') }}"
            placeholder="Max Price"
            class="w-1/2 border rounded px-3 py-2" >
    </div>

    {{-- Sort --}}
    <select name="sort" data-auto-submit class="w-full border rounded px-3 py-2">
        <option value="">Newest</option>
        <option value="price" @selected(request('sort') === 'price')>Price</option>
    </select>

    
        <button type="submit" style="background-color:gray;"
                class="w-full bg-blue-600 text-white py-2 rounded">
            Search
        </button>
    
</form>

<hr class="my-6">

{{-- Results --}}
@forelse($listings as $listing)
    <article class="mb-5">
        <h2 class="text-lg font-semibold" style="text-align: left">
            <a href="{{ route('listing.show', $listing) }}" class="text-blue-600">
                {{ $listing->title }}
            </a>
        </h2>

        <p class="text-gray-600">
            {{ Str::limit($listing->description, 150) }}
        </p>

        <small class="text-gray-500">
            {{ $listing->city }} · ₹{{ number_format($listing->price) }}
        </small>
    </article>
    <hr>
@empty
    <p>No listings found.</p>
@endforelse

{{ $listings->links() }}
</div>
@endsection
