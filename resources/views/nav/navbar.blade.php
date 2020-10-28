<nav class="navbar navbar-expand-md navbar-lite bg-white" id="nav">
    <!-- Left Side Of Navbar -->
    <a class="navbar-brand" href="{{ url('/home') }}" >
        The Watcher
        <!-- <img src="{{ asset('storage/assets/logo_transparent.png') }}" alt="ThrillGIFsLogo" width="150" height="100"> -->
    </a>

    <!-- Right Side Of Navbar -->
    @auth
        <a class="nav-link" href="{{ url('/panel') }}">{{ __('Admin Panel') }}</a>
        <a class="nav-link" href="{{ url('/upload') }}">{{ __('Upload') }}</a>
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</nav>
