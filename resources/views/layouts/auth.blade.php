@include('layouts.partials.header')
<main>
    <div id="wrapper">

        <nav>
            <ul>
                <li class="nav_title">
                    <h1 id="header__title" >{{ $header }}</h1>
                </li>

                <li class="nav_auth_alternate">
                    @if($header != 'Login' )
                        <a href="{{ url('/auth/login') }}" class="header__element header__option">Login</a>
                    @endif
                    @if($header != 'Register')
                        <a href="{{ url('/auth/register') }}" class="header__element header__option">Register</a>
                    @endif
                </li>
            </ul>
        </nav>

        @yield('content')
    </div>
</main>
@include('layouts.partials.footer')