<!DOCTYPE html>

<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>
<body class="@yield('body-layout') contrast__light">
    <!-- Navbar -->
    @include('nav.navbar')

    <!-- Content -->
    @yield('content')
</body>
<script src="{{ asset('/static/js/main.js') }}"></script>
</html>
