@if($opening_type == 'ship')
    @extends('layouts.master', ['home_option' => 'ships', 'header_route' => 'ships.show', 'header_route_id' => $object->id, 'header_name' => $object->name ])
@endif
@if($opening_type == 'bridge')
    @extends('layouts.master', ['home_option' => 'bridges', 'header_route' => 'bridges.show', 'header_route_id' => $object->id, 'header_name' => $object->name ])
@endif
@if($opening_type == 'user')
    @extends('layouts.master', ['home_option' => 'ships', 'header_route' => 'ships.show', 'header_route_id' => $object->id, 'header_name' => $object->name ])
@endif

@section('content')

<ul class="list list--ships">
    @foreach ($openings as $opening)
        <li class="list__el">
            @if($opening_type != 'ship')
                <span class="list__el__el list__el__span--name">{{ $opening->ship_name }}</span>
            @endif
            @if($opening_type != 'bridge')
                <span class="list__el__el list__el__span--name">{{ $opening->bridge_name }}</span>
            @endif
            @if($opening_type != 'user')
                <span class="list__el__el list__el__span--user">{{ $opening->user_name }}</span>
            @endif

            @if($user->id == $opening->user_id)
                <a href=" {{ URL::route('openings.delete', [$opening_type, $opening->id]) }}">
                    <img class="list__el__el list__el__img list__el__img--undo" src="{{ url('img/remove.svg') }}"/>
                </a>
            @else
                    <img class="list__el__el list__el__img list__el__img--undo" src="{{ url('img/blank.svg') }}"/>
            @endif
            <span class="list__el__el list__el__span--time">{{ $opening->created_at->format("H:m -- d.m.y") }}</span>
        </li>
    @endforeach
</ul>


@stop