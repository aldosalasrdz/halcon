<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Halcon</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="bg-gray-900 p-3 text-white">
        <div class="shrink-0 flex items-center container mx-auto">
            <a href="{{ route('track-order') }}">
                <x-application-logo class="h-10 w-auto fill-current text-transparent" />
            </a>
        </div>
    </header>
    @yield('content')
</body>

</html>
