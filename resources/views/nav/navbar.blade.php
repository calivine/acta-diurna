<nav class="navbar navbar-lite bg-light" id="nav">

    <!-- Left Side Of Navbar -->
    <a class="navbar-brand" href="{{ url('/') }}">{{ __('Nightmare Houses') }}</a>

    <!-- Right Side Of Navbar -->
    <!-- Nav links if User is authenticated -->
    <ul class="nav">
        <li class="nav-item">
            <a href="{{ url('/about') }}" class="nav-link">{{ __('About') }}</a>
        </li>
        @auth
            @isAdmin
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/podcasts') }}">{{ __('Podcasts') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/panel') }}">{{ __('Admin Panel') }}</a>
            </li>
            @endisAdmin
            
            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </ul>


</nav>
