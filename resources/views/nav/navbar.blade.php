<nav class="navbar navbar-expand-md navbar-lite bg-white" id="nav">
    <!-- Left Side Of Navbar -->
    <a class="navbar-brand" href="{{ url('/') }}">{{ __('The Lorelei Lee') }}</a>
    <!-- Right Side Of Navbar -->
    <!-- Nav links if User is authenticated -->
    @auth
        <a class="nav-link" href="{{ url('/panel') }}">{{ __('Admin Panel') }}</a>
        <a class="nav-link" href="{{ url('/upload') }}">{{ __('Upload') }}</a>
        <!-- Logout -->
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <a class="nav-link" href="{{ url('/about') }}">{{ __('About') }}</a>
        <a class="nav-link" href="{{ url('/thewatcher') }}">{{ __('The Watcher') }}</a>
        <a class="nav-link" href="{{ url('/highfields') }}">{{ __('Highfields') }}</a>
    @endauth
</nav>
