@include('layouts.partials.header')
<main>
    <div id="wrapper">

        <header id="header" class="clearfix" role="header">
            <h1 id="header__title" >{{ $header }}</h1>

            @if($header != 'Login' )
                <a href="{{ url('/auth/login') }}" class="header__element header__option">Login</a>
            @endif
            @if($header != 'Register')
                <a href="{{ url('/auth/register') }}" class="header__element header__option">Register</a>
            @endif

        </header>

        @yield('content')
    </div>
</main>
@include('layouts.partials.footer')