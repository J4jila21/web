@props(['title' => 'Coffe Shop', 'hideNavbar', 'hideFooter' => false])
<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link rel="icon" type="image/x-icon" href="/img/20.jpg">
    <title>{{ $title ?? 'Coffe Shop' }}</title>
</head>
<body class="h-full">
    <div class="min-h-full">
        {{-- Navbar hanya muncul jika hideNavbar tidak true --}}
        @unless($hideNavbar ?? false)
            @include('components.navbar')
        @endunless

        @isset($header)
            <header>{{ $header }}</header>
        @endisset

        <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
        @unless ($hideFooter?? false)
            @include('components.footer')     
        @endunless
    </div>
</body>
</html>
