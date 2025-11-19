@props(['title' => 'Seduhin', 'hideNavbar' => false, 'hideFooter' => false])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/seduhin_logo.ico">
<title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-full bg-white">
    {{ $slot }}
    @livewireScripts

</body>
</html>
