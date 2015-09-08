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

<table class="list">
    @foreach ($openings as $opening)
        <tr>
            @if($opening_type != 'ship')
                <td class="ship_name"><div class="ship_name__container"><span>{{ $opening->ship_name }}</span></div></td>
            @endif
            @if($opening_type != 'bridge')
                <td class="bridge_name"><span>{{ $opening->bridge_name }}</span></td>
            @endif
            @if($opening_type != 'user')
                <td class="user_name"><span>{{ $opening->user_name }}</span></td>
            @endif
            <td class="time"><span>{{ $opening->created_at->format("H:m - d M y") }}</span></td>


            <td class="remove">
                @if($user->id == $opening->user_id)
                    <a href=" {{ URL::route('openings.delete', [$opening_type, $opening->id]) }}">
                        <img class="list__el__el list__el__img list__el__img--undo" src="{{ url('img/remove.svg') }}"/>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
</table>

@stop