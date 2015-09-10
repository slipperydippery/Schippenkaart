<?php
    if($opening_type == 'ship') {
        $home_option = 'ships';
        $header_route = 'ships.show';
    }
    else if($opening_type == 'bridge'){
        $home_option = 'bridges';
        $header_route = 'bridges.show';
    }
    else if($opening_type == 'user') {
        $home_option = 'users';
        $header_route = 'users.show';
    }
?>

@extends('layouts.master', ['home_option' => $home_option, 'header_route' => $header_route, 'header_route_id' => $object->id, 'header_name' => $object->name ])

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