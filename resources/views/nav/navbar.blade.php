<nav class="navbar navbar-expand-md navbar-lite bg-white" id="nav">
    <!-- Left Side Of Navbar -->
    <a class="navbar-brand" href="{{ url('/') }}">{{ __('Nightmare Houses') }}</a>

    <a class="nav-link" href="{{ url('/podcasts') }}">{{ __('Podcast') }}</a>

    <!-- Right Side Of Navbar -->
    <!-- Nav links if User is authenticated -->
    @auth
        @isAdmin
            <a class="nav-link" href="{{ url('/panel') }}">{{ __('Admin Panel') }}</a>
        @endisAdmin
        <!-- Logout -->
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth

</nav>
