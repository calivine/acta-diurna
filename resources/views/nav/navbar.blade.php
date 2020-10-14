<nav class="navbar navbar-expand-md navbar-dark" id="nav">
    <!-- Left Side Of Navbar -->
    <a class="navbar-brand" href="{{ url('/home') }}" >Home</a>

    <!-- Right Side Of Navbar -->
    @auth
        <a class="nav-link" href="{{ url('/panel') }}">Admin Panel</a>
    @endauth
</nav>
