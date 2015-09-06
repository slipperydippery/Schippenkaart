@include('layouts.partials.header')
<main>
    <div id="wrapper">
        <header id="header" class="clearfix" role="header">
            @if(isset($home_option))
                @if($home_option == 'ships')
                    <a href="{{ URL::route('ships.index') }}" class="header__element" id="home__option" >
                        <div class="header__element" id="home_option"><img src="{{ url('img/ship_icon.svg') }}"/></div>
                    </a>
                @elseif($home_option == 'bridges')
                    <a href="{{ URL::route('bridges.index') }}" class="header__element" id="home__option" >
                        <div class="header__element" id="home_option"><img src="{{ url('img/bridge_icon.svg') }}"/></div>
                    </a>
                @endif
            @endif

            @if(isset($header_route_id))
                <a href="{{ URL::route($header_route, $header_route_id) }}" id="header__title" class="header__element">
                    <h1>{{ $header_name }}</h1>
                </a>
            @else
                <a href="{{ URL::route($header_route) }}" id="header__title" class="header__element">
                    <h1>{{ $header_name }}</h1>
                </a>
            @endif

            @include('layouts.partials.menu')

            @if(isset($header_option))
                @if($header_option == 'bridge')
                    <a href="{{ URL::route('bridges.index') }}" class="header__element header__option">
                        <div class="header__element header__option"><img src="{{ url('img/bridge_icon.svg') }}"/></div>
                    </a>
                @elseif($header_option == 'ship')
                    <a href="{{ URL::route('ships.index') }}" class="header__element header__option">
                        <div class="header__element header__option"><img src="{{ url('img/ship_icon.svg') }}"/></div>
                    </a>


                @elseif($header_option == 'strippen')
                    <a href="{!! URL::route('ships.purchase', $ship->id) !!}">
                        <div class="header__element header__option header__option--strippen"><span>{{ $ship->strippen_total }}</span></div>
                    </a>
                @endif

            @endif
        </header>


        <div id="content">

            @if(Session::has('global'))
                {{ Session::get('global') }}
            @endif

            @yield('content')
        </div>

    </div>
</main>

@include('layouts.partials.footer')
