
<ul id="nav__menu">
    <li>
        <a href="#" id="nav__icon" class="header__element header__option"><img src="{{ url('img/menu_icon.svg') }}"/></a>
        <ul>
            <li>
                <a href="{{ URL::route('ships.index') }}" class="header__element" id="home__option" >
                    Schepen
                </a>
            </li>
            <li>
                <a href="{{ URL::route('bridges.index') }}" class="header__element" id="home__option" >
                    Bruggen
                </a>
            </li>
            <li>
                <a href="{{ URL::route('users.index') }}" class="header__element" id="home__option" >
                    Brugwachters
                </a>
            </li>
            <li>
                <a href="{{ URL::route('openings.showtype', ['user', '1']) }}">
                    Mijn Geschiedenis
                </a>
            </li>
            <li>
                <a href="{{ URL::route('about') }}">
                    Edit Profile
                </a>
            </li>
            <li>
                <a href="{{ action('Auth\AuthController@getLogout') }}">
                    Logout
                </a>
            </li>

        </ul>

    </li>

</ul>
