<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="flex: 1; text-align: center;">
            {{ __('Construction') }}
        </h2>
        <a href="{{ route('construction-galleries.create') }}" title="Create Category">
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
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h2>&nbsp;</h2>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th><th>Title</th><th>Image</th><th>Status</th><th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($galleries as $gallery)
                                        <tr>
                                            <td>{{ $gallery->id }}</td>
                                            <td>{{ $gallery->title }}</td>
                                            <td><img src="{{ asset('storage/'.$gallery->image) }}" width="100"></td>
                                            <td>{{ $gallery->status ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('construction-galleries.edit', $gallery) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('construction-galleries.destroy', $gallery) }}" method="POST" style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this photo?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        {{ $galleries->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

