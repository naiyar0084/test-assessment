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
                <div class="p-6 text-gray-900 dark:text-gray-100 myform">
                <div class="container">
                    <h2>Create Property</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @include('properties.form')
                        <button type="submit" class="btn btn-success">Create</button>
                    </form>
                </div>

</div>
</div>
</div>
</div>
</x-app-layout>
