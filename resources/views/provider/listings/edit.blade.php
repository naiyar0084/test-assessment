@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">
<h1>Edit Listing</h1>

<p>Status: <strong>{{ ucfirst($listing->status) }}</strong></p>

@if($listing->moderation_note)
    <p><strong>Moderation Note:</strong> {{ $listing->moderation_note }}</p>
@endif

<form method="POST"
      action="{{ route('provider.listings.update', $listing) }}">
    @method('PUT')

    @include('provider.listings.form', [
        'listing' => $listing,
        'buttonText' => 'Update Listing'
    ])
</form>
</div>
@endsection
