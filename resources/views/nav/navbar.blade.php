<nav class="navbar navbar-expand-md navbar-lite bg-white" id="nav">
    <!-- Left Side Of Navbar -->
    <a class="navbar-brand" href="{{ url('/') }}">{{ __('Nightmare Houses') }}</a>

    <!-- Right Side Of Navbar -->
    <!-- Nav links if User is authenticated -->
    <ul class="nav justify-content-end">
        @auth
            @isAdmin
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
