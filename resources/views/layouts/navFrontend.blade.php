<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#FF639A">
    <!-- #EF7B8C -->
    <a class="navbar-brand text-white" href="{{url('/')}}">Pink Postcards</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active ml-3">
                <a class="text-white" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ml-3">
                <a class="text-white" href="{{url('/postcards')}}">Postcards</a>
            </li>
            <li class="nav-item ml-3">
                <a class="text-white" href="#about">About Us</a>
            </li>
            <li class="nav-item ml-3">
                <a class="text-white" href="#contactform">Contact Us</a>
            </li>
            @if (Route::has('login'))
            @auth
            <!-- Authentication -->
            <!--<form method="POST" style="right: 5%; position: absolute;" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" class="text-white" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form> -->

            <!-- Dashboard -->
            @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))
            <li class="nav-item ml-3">
                <a href="{{ url('/dashboard') }}" class="text-sm text-white">Dashboard</a>
            </li>
            @endif
            <!-- Authentication -->
            <form method="POST" style="right: 2%; position: absolute;" action="{{ route('logout') }}">
                @csrf
                <!-- <x-dropdown-link :href="route('logout')" class="text-white" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                    </x-dropdown-link> -->
                <a href="{{route('logout')}}" class="text-white" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
            </form>

            @else
            <!-- Login -->
            <a href=" {{ route('login') }}" class="text-sm text-white align-text-center" style="right: 5%; position: absolute;">Log in</a>
            <!-- Register -->
            <!-- @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-sm text-white align-text-center" style="right:10%; position:absolute;">Register</a>
            @endif -->

            @endauth
            @endif

        </ul>
    </div>
</nav>