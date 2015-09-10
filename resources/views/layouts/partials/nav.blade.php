<ul>
    @if(isset($home_option))
        <li class="nav_home_option">
            @if($home_option == 'ships')
                <a href="{{ URL::route('ships.index') }}" class="header__element" id="home__option" >
                    <div class="header__element" id="home_option"><img src="{{ url('img/ship_icon.svg') }}"/></div>
                </a>
            @elseif($home_option == 'bridges')
                <a href="{{ URL::route('bridges.index') }}" class="header__element" id="home__option" >
                    <div class="header__element" id="home_option"><img src="{{ url('img/bridge_icon.svg') }}"/></div>
                </a>
            @elseif($home_option == 'users')
                <a href="{{ URL::route('users.index') }}" class="header__element" id="home__option" >
                    <div class="header__element" id="home_option"><img src="{{ url('img/users_icon.svg') }}"/></div>
                </a>
            @endif
        </li>
    @else
        <li class="nav_home_fill"></li>
    @endif


    <li class="nav_title">
        @if(isset($header_route_id))
            <a href="{{ URL::route($header_route, $header_route_id) }}" id="header__title" class="header__element">
                <h1>{{ $header_name }}</h1>
            </a>
        @else
            <a href="{{ URL::route($header_route) }}" id="header__title" class="header__element">
                <h1>{{ $header_name }}</h1>
            </a>
        @endif
    </li>

    <li class="nav_menu">
        @include('layouts.partials.menu')
    </li>
</ul>


@if(isset($strippen))
    <a href="{!! URL::route('ships.purchase', $ship->id) !!}">
        <div class="nav_strippen"><span>{{ $ship->strippen_total }}</span></div>
    </a>
@endif
