<nav class="navbar navbar-expand-md navbar-dark" id="nav">
    <!-- Left Side Of Navbar -->
    <a class="navbar-brand" href="{{ url('/home') }}" >Home</a>

    <!-- Right Side Of Navbar -->
    @auth
        <a class="nav-link" href="{{ url('/panel') }}">Admin Panel</a>
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</nav>
