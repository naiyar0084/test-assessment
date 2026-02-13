@extends('layouts.app')

@section('content')

<article>
<div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">
    <h2>{{ $listing->title }}</h2>

    <p>
       Category:  {{ $listing->category }} 
    </p><p>
       Location:  {{ $listing->city }}, {{ $listing->suburb }}
    </p>

    <p>
      Price:  {{ $listing->pricing_model === 'hourly' ? '₹'.$listing->price.'/hr' : '₹'.$listing->price }}
    </p>

    <hr>

    <div>
       Description:  {{ $listing->description }}
    </div>

    <hr>

    <h5>Contact Provider</h5>
    @include('listings.partials.enquiry-form')
</div>
</article>
@endsection
