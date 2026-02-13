@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">
<h2>Admin Listings</h2>

@foreach($listings as $listing)
    <div>
        <strong>{{ $listing->title }}</strong>

        <form method="POST" action="{{ route('admin.listings.approve', $listing) }}">
            @csrf
           <button class="bg-gray-600 text-black px-3 py-1 rounded" style="background-color: green">Approve</button>
        </form>

        <form method="POST" action="{{ route('admin.listings.reject', $listing) }}">
            @csrf
            <input name="note" placeholder="Reason">
            <button class="bg-red-600 text-white px-3 py-1 rounded">Reject</button>
        </form>
        {{-- Suspend (THIS IS WHERE IT'S USED) --}}
         <form method="POST"
              action="{{ route('admin.listings.suspend', $listing) }}"
              class="inline">
            @csrf
            <button class="bg-red-600 text-black px-3 py-1 rounded" style="background-color: orange">
                Suspend
            </button>
        </form>

    </div>
<hr>
@endforeach

{{ $listings->links() }}
</div>
@endsection
