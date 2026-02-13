<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="flex: 1; text-align: center;">
            {{ __('FAQs') }}
        </h2>
        <a href="{{ route('testimonials.create') }}" title="Create Category">
        <svg xmlns="http://www.w3.org/2000/svg" 
             width="25" 
             height="25"  
             fill="#202d64" 
             class="bi bi-plus-circle-fill cursor-pointer"              
             viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
        </svg></a>
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container">
                    <h2>{{ $property->title }}</h2>
                    <img src="{{ asset('storage/' . $property->image) }}" alt="" width="300" class="mb-3">

                                
                                <p><strong>Label:</strong> {{ $property->label }}</p>
                                <p><strong>Segment:</strong> {{ $property->segment }}</p>
                                <p><strong>Type:</strong> {{ $property->type }}</p>
                                <p><strong>Location:</strong> {{ $property->location }}</p>
                                <p><strong>Price:</strong> ₹{{ number_format($property->price) }}</p>
                                <p><strong>Area:</strong> {{ $property->area }} sq.ft</p>
                                <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
                                <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
                                <p><strong>Furnishing:</strong> {{ $property->furnishing }}</p>
                                <p><strong>Parking:</strong> {{ $property->parking ? 'Yes' : 'No' }}</p>
                                <p><strong>Status:</strong> {{ ucfirst($property->status) }}</p>

                    <a href="{{ route('properties.index') }}" class="btn btn-secondary mt-3">Back to List</a>
                </div>

                </div></div></div></div>
</x-app-layout>