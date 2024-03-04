@php
    $mainClasses = '';
    if (
        request()->routeIs('login') ||
        request()->routeIs('register') ||
        request()->routeIs('password.request') ||
        request()->routeIs('password.reset') ||
        request()->routeIs('verification.notice') ||
        request()->routeIs('verification.verify') ||
        request()->routeIs('password.confirm')
    ) {
        $mainClasses .= 'form-signin';
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="py-5">
    <div class="container">
        @include('layouts.header')
        <main class="py-4">
            @yield('content')
        </main>        
    </div>
</body>


@if(true)
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>

<script>
    new DataTable('.dataTable');
</script>
@endif


</html>
