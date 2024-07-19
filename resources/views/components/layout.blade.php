<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $metaTitle ?? 'Blog by Eddy' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Developer' }}">
</head>

<body>

    <x-partials.nav />

    @session('status')
        <div>{{ $value }}</div>
    @endsession

    {{ $slot }}

    @isset($sidebar)
        <div id="sidebar">
            <h3>Sidebar</h3>
            <div>{{ $sidebar }}</div>
        </div>
    @endisset

</body>

</html>
