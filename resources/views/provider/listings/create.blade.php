@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">

    <h1 class="text-2xl font-bold mb-6 text-center">
        Create Listing
    </h1>

    <form method="POST" action="{{ route('provider.listings.store') }}">
        @include('provider.listings.form', [
            'buttonText' => 'Create Listing'
        ])
    </form>

</div>
@endsection
