<nav class="navbar navbar-expand-md navbar-lite bg-white" id="nav">
    <!-- Left Side Of Navbar -->
    <a class="navbar-brand" href="{{ url('/') }}">{{ __('The Watcher') }}</a>
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
        <a class="nav-link" href="{{ url('/') }}">{{ __('Sources/Links') }}</a>
        <a class="nav-link" href="{{ url('/') }}">{{ __('About') }}</a>
        <a class="nav-link" href="{{ url('/') }}">{{ __('') }}</a>
    @endauth
</nav>
