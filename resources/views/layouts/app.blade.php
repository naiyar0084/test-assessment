<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

        <link rel="stylesheet" href="{{ asset('build/assets/app-BVg9DDeF.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/app-Df05aimO.css') }}">
        <script src="{{ asset('build/assets/app-DYK2G7ou.js') }}" type="module"></script>

        <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">        
        <link rel="stylesheet" href="{{ asset('backend/summernote/summernote-lite.css') }}">
        <script src="{{ asset('backend/summernote/summernote-lite.js') }}" type="module"></script>
        <!-- summernote validation   -->
        <script src="{{ asset('backend/summernote/summernote-script.js') }}" type="module"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
         <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                 @yield('content')
            </main>
        </div>
   
    <script>
document.addEventListener('DOMContentLoaded', function () {

    // Dropdown auto-submit (already works)
    document.querySelectorAll('[data-auto-submit]').forEach(el => {
        el.addEventListener('change', () => el.form.submit());
    });

    // Text & number inputs → submit on blur
    document.querySelectorAll('input[type="text"], input[type="number"]').forEach(el => {
        el.addEventListener('blur', () => {
            if (el.value.trim() !== '') {
                el.form.submit();
            }
        });
    });

});
</script>



    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
              
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js'></script>
    </body>
</html>
