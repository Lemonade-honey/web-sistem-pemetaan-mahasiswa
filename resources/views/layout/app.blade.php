<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    @vite('resources/css/app.css')
    @stack('style')
</head>
<body>
    @if (auth()->check())
        {{-- sidebar and navbar start --}}
        {{-- @include('include.sidenav') --}}
        {{-- sidebar and navbar start --}}

        <div class="p-4 mt-20 sm:mr-4 sm:ml-64">
            @yield('body')
        </div>
    @else
        {{-- jika belum login --}}
        <div class="p-4">
            @yield('body')
        </div>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @stack('script')
</body>
</html>